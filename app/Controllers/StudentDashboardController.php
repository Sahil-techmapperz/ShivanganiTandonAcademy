<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;
use App\Models\ResultModel;
use App\Models\AnnouncementModel;
use App\Models\ExamSubmissionModel;
use App\Models\LessonProgressModel;

class StudentDashboardController extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('student/dashboard'));
    }

    public function dashboard()
    {
        $userId = session()->get('id');
        $db = \Config\Database::connect();
        
        $studentModel = new \App\Models\StudentModel();
        $user = $studentModel->find($userId);
        if ($user) {
            session()->set('phone', $user['phone'] ?? '');
            session()->set('profile_pic', $user['profile_pic'] ?? '');
        }

        $enrollmentModel = new EnrollmentModel();
        $announcementModel = new AnnouncementModel();

        // Join enrollments with courses to get dynamic data
        $enrollments = $enrollmentModel->where('user_id', $userId)->where('status', 'approved')->findAll();
        $enrolledCoursesCount = count($enrollments);
        
        // Calculate dynamic average progress
        $totalProgress = 0;
        foreach ($enrollments as $e) {
            $syncData = $this->syncCourseProgress($userId, $e['course_id']);
            $totalProgress += $syncData['progress'];
        }
        $avgProgress = $enrolledCoursesCount > 0 ? round($totalProgress / $enrolledCoursesCount) : 0;

        // Support tickets count
        $supportCount = $db->table('tbl_support_requests')->where('user_id', $userId)->where('status', 'pending')->countAllResults();

        // Completed lessons count
        $completedLessonsCount = $db->table('tbl_lesson_progress')->where('user_id', $userId)->countAllResults();

        // Recent Activity Fetching
        $activities = [];

        // 1. Quizzes (from submissions)
        $quizzes = $db->table('tbl_exam_submissions s')
            ->select('s.score, s.status, s.title as lesson_name, c.title as course_name, s.created_at')
            ->join('tbl_courses c', 'c.id = s.course_id')
            ->where('s.user_id', $userId)
            ->where('s.type', 'quiz')
            ->orderBy('s.created_at', 'DESC')
            ->limit(5)->get()->getResultArray();
            
        foreach($quizzes as $q) {
            $activities[] = [
                'icon' => 'bi-check-circle-fill',
                'bg'   => 'bg-success',
                'title' => 'Completed Quiz: ' . $q['lesson_name'],
                'desc'  => ($q['status'] == 'graded') ? 'Scored ' . round($q['score']) . '% in ' . $q['course_name'] : 'Submitted for ' . $q['course_name'],
                'time'  => $q['created_at']
            ];
        }

        // 2. Lessons Completed
        $lessons = $db->table('tbl_lesson_progress p')
            ->select('l.title as lesson_name, c.title as course_name, p.created_at')
            ->join('tbl_lessons l', 'l.id = p.lesson_id')
            ->join('tbl_courses c', 'c.id = l.course_id')
            ->where('p.user_id', $userId)
            ->orderBy('p.created_at', 'DESC')
            ->limit(5)->get()->getResultArray();
        foreach($lessons as $l) {
            $activities[] = [
                'icon' => 'bi-play-fill',
                'bg'   => 'bg-primary',
                'title' => 'Watched Lesson: ' . $l['lesson_name'],
                'desc'  => 'In course: ' . $l['course_name'],
                'time'  => $l['created_at']
            ];
        }

        // 3. Exams Submitted
        $exams = $db->table('tbl_exam_submissions s')
            ->select('s.title as lesson_name, c.title as course_name, s.created_at')
            ->join('tbl_courses c', 'c.id = s.course_id')
            ->where('s.user_id', $userId)
            ->where('s.type', 'exam')
            ->orderBy('s.created_at', 'DESC')
            ->limit(5)->get()->getResultArray();
        foreach($exams as $e) {
            $activities[] = [
                'icon' => 'bi-file-earmark-text-fill',
                'bg'   => 'bg-info',
                'title' => 'Submitted Exam: ' . $e['lesson_name'],
                'desc'  => 'Waiting for manual grading.',
                'time'  => $e['created_at']
            ];
        }

        // Sort combined activities by time DESC
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });
        $activities = array_slice($activities, 0, 5);

        // Fetch Announcements
        $announcements = $announcementModel->groupStart()
                                            ->where('target_type', 'all')
                                            ->orWhere('student_id', $userId)
                                          ->groupEnd()
                                          ->orderBy('created_at', 'DESC')
                                          ->limit(5)
                                          ->findAll();

        $data = [
            'title'         => 'Student Dashboard',
            'user'          => session()->get(),
            'courseCount'   => $enrolledCoursesCount,
            'avgProgress'   => $avgProgress,
            'supportCount'  => $supportCount,
            'completedLessonsCount' => $completedLessonsCount,
            'activities'    => $activities,
            'announcements' => $announcements
        ];

        return view('student/dashboard', $data);
    }

    public function courses()
    {
        $userId = session()->get('id');
        $enrollmentModel = new EnrollmentModel();

        // Get all enrollments with course details
        $enrollments = $enrollmentModel->select('tbl_enrollments.*, tbl_courses.title as name, tbl_courses.description, tbl_courses.image')
                                  ->join('tbl_courses', 'tbl_courses.id = tbl_enrollments.course_id')
                                  ->where('tbl_enrollments.user_id', $userId)
                                  ->orderBy('tbl_enrollments.enrolled_at', 'DESC')
                                  ->findAll();

        // Synchronize and inject real-time progress and status
        foreach ($enrollments as &$e) {
            $syncData = $this->syncCourseProgress($userId, $e['course_id']);
            $e['progress'] = $syncData['progress'];
            $e['status']   = $syncData['status'];
        }

        $data = [
            'title'   => 'My Courses',
            'courses' => $enrollments
        ];
        return view('student/courses', $data);
    }

    public function profile()
    {
        $userId = session()->get('id');
        $model = new UserModel();
        $student = $model->find($userId);

        // Fetch enrolled course dynamically
        $enrollmentModel = new EnrollmentModel();
        $enrollment = $enrollmentModel->select('tbl_courses.title')
                                     ->join('tbl_courses', 'tbl_courses.id = tbl_enrollments.course_id')
                                     ->where('tbl_enrollments.user_id', $userId)
                                     ->first();

        $data = [
            'title'   => 'My Profile',
            'student' => $student,
            'course'  => $enrollment['title'] ?? 'No Active Course'
        ];
        return view('student/profile', $data);
    }

    public function results()
    {
        $userId = session()->get('id');
        $resultModel = new ResultModel();
        $submissionModel = new ExamSubmissionModel();
        $lessonModel = new \App\Models\LessonModel();
        $questionModel = new \App\Models\ExamQuestionModel();
        $settingModel = new \App\Models\SettingModel();

        // Fetch manual results
        $manualResults = $resultModel->where('user_id', $userId)->findAll();
        
        // Fetch assessment submissions
        $submissions = $submissionModel->where('user_id', $userId)->findAll();

        $submissionTitles = array_column($submissions, 'title');
        $consolidatedResults = [];

        // Map manual results - Skip if a submission with the same subject title exists
        foreach ($manualResults as $res) {
            if (in_array($res['subject'], $submissionTitles)) {
                continue;
            }
            
            $consolidatedResults[] = [
                'subject'       => $res['subject'],
                'exam_date'     => $res['exam_date'],
                'score'         => (int)$res['score'],
                'total_points'  => (int)($res['total_points'] ?? 100),
                'passing_score' => 75, // Default for manual if not specified
                'status'        => 'graded',
                'id'            => 'RES_'.$res['id']
            ];
        }

        // Map submissions
        foreach ($submissions as $sub) {
            // Find the lesson for this submission to get passing score
            $lesson = $lessonModel->where(['title' => $sub['title']])->first();
            
            // Calculate total possible points for this lesson
            $totalPoints = 0;
            if ($lesson) {
                if ($lesson['type'] === 'quiz') {
                    $totalPoints = $questionModel->where('lesson_id', $lesson['id'])->selectSum('points')->first()['points'] ?? 0;
                } else {
                    // For exams, usually the single question row has the total points
                    $totalPoints = $questionModel->where('lesson_id', $lesson['id'])->first()['points'] ?? 0;
                }
            }

            $consolidatedResults[] = [
                'subject'       => $sub['title'],
                'exam_date'     => date('Y-m-d', strtotime($sub['created_at'])),
                'score'         => !is_null($sub['score']) ? (int)$sub['score'] : null,
                'total_points'  => (int)$totalPoints,
                'passing_score' => (int)($lesson['passing_score'] ?? 0),
                'status'        => $sub['status'],
                'id'            => 'SUB_'.$sub['id']
            ];
        }

        // --- ADDED: Fetch results from tbl_results that might be auto-saved from mock/unit tests ---
        // (The manualResults loop already covers these if we save them to tbl_results with appropriate subjects)

        // Sort by date descending
        usort($consolidatedResults, function($a, $b) {
            return strtotime($b['exam_date']) - strtotime($a['exam_date']);
        });

        $signature = $settingModel->getSetting('director_signature');

        $data = [
            'title'     => 'Exam Results',
            'results'   => $consolidatedResults,
            'signature' => $signature['key_value'] ?? ''
        ];
        return view('student/results', $data);
    }

    public function academy()
    {
        $userId = session()->get('id');
        $courseModel = new \App\Models\CourseModel();
        $enrollmentModel = new \App\Models\EnrollmentModel();

        // Get courses user is already enrolled in
        $enrolledCourseIds = $enrollmentModel->where('user_id', $userId)
                                           ->findColumn('course_id') ?: [0];

        // Get available courses (not enrolled yet)
        $availableCourses = $courseModel->whereNotIn('id', $enrolledCourseIds)->findAll();

        $data = [
            'title'   => 'Browse Academy',
            'courses' => $availableCourses
        ];
        return view('student/academy', $data);
    }

    public function enroll()
    {
        $userId = session()->get('id');
        $courseId = $this->request->getPost('course_id');
        $message = $this->request->getPost('message');
        
        if (!$courseId) {
            return redirect()->back()->with('error', 'Invalid course selection.');
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        
        // Check if already enrolled (double-check)
        $exists = $enrollmentModel->where(['user_id' => $userId, 'course_id' => $courseId])->first();
        if ($exists) {
            return redirect()->to(base_url('student/courses'))->with('info', 'You already have an enrollment request for this course.');
        }

        $enrollmentModel->insert([
            'user_id'     => $userId,
            'course_id'   => $courseId,
            'progress'    => 0,
            'status'      => 'pending',
            'message'     => $message,
            'enrolled_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('student/academy'))->with('success', 'Enrollment request submitted successfully! Waiting for admin approval.');
    }

    private function syncCourseProgress($userId, $courseId)
    {
        $lessonModel = new \App\Models\LessonModel();
        $progressModel = new \App\Models\LessonProgressModel();
        $enrollmentModel = new \App\Models\EnrollmentModel();

        // Get current enrollment
        $enrollment = $enrollmentModel->where(['user_id' => $userId, 'course_id' => $courseId])->first();
        if (!$enrollment) return ['progress' => 0, 'status' => 'pending'];

        $totalLessons = $lessonModel->where('course_id', $courseId)->countAllResults();
        $completedCount = $progressModel->where('user_id', $userId)
                                       ->where('course_id', $courseId)
                                       ->countAllResults();

        $newProgress = $totalLessons > 0 ? round(($completedCount / $totalLessons) * 100) : 0;
        
        $updateData = ['progress' => $newProgress];
        
        // Only update status if it's already approved (not pending)
        if ($enrollment['status'] !== 'pending') {
            $updateData['status'] = ($newProgress >= 100 && $totalLessons > 0) ? 'completed' : 'in-progress';
        }

        $enrollmentModel->where(['user_id' => $userId, 'course_id' => $courseId])
                       ->set($updateData)
                       ->update();

        return array_merge(['status' => $enrollment['status']], $updateData);
    }

    public function viewCourse($id)
    {
        $userId = session()->get('id');
        $enrollmentModel = new \App\Models\EnrollmentModel();
        
        $enrollment = $enrollmentModel->select('tbl_enrollments.*, tbl_courses.title as name, tbl_courses.description')
                                     ->join('tbl_courses', 'tbl_courses.id = tbl_enrollments.course_id')
                                     ->where(['tbl_enrollments.course_id' => $id, 'tbl_enrollments.user_id' => $userId])
                                     ->first();

        if (!$enrollment) {
            return redirect()->to(base_url('student/academy'))->with('error', 'You must enroll first.');
        }

        // Ensure progress is synced before viewing
        $syncData = $this->syncCourseProgress($userId, $id);
        $enrollment['progress'] = $syncData['progress'];
        $enrollment['status']   = $syncData['status'];

        // Fetch dynamic lessons from the database
        $lessonModel = new \App\Models\LessonModel();
        $resourceModel = new \App\Models\ResourceModel();

        $lessons = $lessonModel->where('course_id', $enrollment['course_id'])
                               ->orderBy('sort_order', 'ASC')
                               ->findAll();

        if (!empty($lessons)) {
            $progressModel = new LessonProgressModel();
            $completedLessons = $progressModel->where('user_id', $userId)
                                             ->where('course_id', $enrollment['course_id'])
                                             ->findColumn('lesson_id') ?: [];

            $questionModel = new \App\Models\ExamQuestionModel();
            $submissionModel = new \App\Models\ExamSubmissionModel();
            
            // Map submissions by title for this user and course
            $submissions = $submissionModel->where(['user_id' => $userId, 'course_id' => $enrollment['course_id']])->findAll();
            $submissionMap = [];
            foreach ($submissions as $sub) {
                $submissionMap[$sub['title']] = $sub;
            }

            // Inject resources, questions and completion status for each lesson
            foreach ($lessons as &$lesson) {
                $lesson['is_completed'] = in_array($lesson['id'], $completedLessons);
                $lesson['materials'] = $resourceModel->where('lesson_id', $lesson['id'])->findAll();
                
                // Track submission status
                $lesson['is_submitted'] = isset($submissionMap[$lesson['title']]);
                if ($lesson['is_submitted']) {
                    $lesson['submission'] = $submissionMap[$lesson['title']];
                }

                // Fetch questions if this is an assessment
                if ($lesson['type'] !== 'video') {
                    $lesson['questions'] = $questionModel->where('lesson_id', $lesson['id'])->findAll();
                }
                
                // Map database fields to the view's expected structure
                foreach ($lesson['materials'] as &$res) {
                    $res['name'] = $res['file_name'];
                    $res['type'] = $res['file_type'];
                    $res['size'] = $res['file_size'];
                    $res['url']  = base_url($res['file_path']);
                }
            }
        }

        $data = [
            'title'      => 'Course Player',
            'course'     => $enrollment,
            'enrollment' => $enrollment,
            'lessons'    => $lessons
        ];
        return view('student/course_view', $data);
    }

    public function updateProgress()
    {
        $userId = session()->get('id');
        $enrollmentId = $this->request->getPost('enrollment_id');
        $lessonId = $this->request->getPost('lesson_id');

        if (!$enrollmentId || !$lessonId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
        }

        $enrollmentModel = new EnrollmentModel();
        $progressModel = new LessonProgressModel();

        $enrollment = $enrollmentModel->find($enrollmentId);
        if (!$enrollment) return $this->response->setJSON(['status' => 'error', 'message' => 'Enrollment not found']);

        // Record lesson completion
        $progressData = [
            'user_id'   => $userId,
            'course_id' => $enrollment['course_id'],
            'lesson_id' => $lessonId
        ];
        
        try {
            $progressModel->insert($progressData);
        } catch (\Exception $e) {
            // Already completed
        }

        // Use the centralized sync helper
        $syncData = $this->syncCourseProgress($userId, $enrollment['course_id']);

        return $this->response->setJSON([
            'status' => 'success', 
            'message' => 'Progress updated',
            'new_progress' => $syncData['progress'],
            'new_status' => $syncData['status']
        ]);
    }

    public function submitExam()
    {
        $userId = session()->get('id');
        $courseId = $this->request->getPost('course_id');
        $title = $this->request->getPost('title');
        $type = $this->request->getPost('type');
        $answers = $this->request->getPost('answers');

        if (!$courseId || !$title) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing required data']);
        }

        $model = new ExamSubmissionModel();
        
        // Server-side check for existing submission
        $existing = $model->where(['user_id' => $userId, 'course_id' => $courseId, 'title' => $title])->first();
        if ($existing) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'You have already submitted this assessment.']);
        }

        $filePath = null;

        // Handle File Upload for Exams
        if ($type === 'exam') {
            $file = $this->request->getFile('exam_file');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('public/uploads/submissions/', $newName);
                $filePath = 'public/uploads/submissions/' . $newName;
            } else if (!$answers) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Please upload your exam paper.']);
            }
        }

        $data = [
            'user_id'   => $userId,
            'course_id' => $courseId,
            'title'     => $title,
            'type'      => $type,
            'answers'   => $answers ?? 'File Submission',
            'file_path' => $filePath,
            'status'    => 'pending'
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Assessment submitted successfully! Waiting for admin review.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit assessment.']);
        }
    }

    public function viewResources($id)
    {
        $userId = session()->get('id');
        $enrollmentModel = new \App\Models\EnrollmentModel();
        
        $enrollment = $enrollmentModel->join('tbl_courses', 'tbl_courses.id = tbl_enrollments.course_id')
                                     ->where(['tbl_enrollments.course_id' => $id, 'tbl_enrollments.user_id' => $userId])
                                     ->first();

        if (!$enrollment) {
            return redirect()->to(base_url('student/academy'))->with('error', 'Enroll to access resources.');
        }

        $data = [
            'title'  => 'Study Resources',
            'course' => $enrollment
        ];
        return view('student/resources', $data);
    }

    public function updateProfile()
    {
        $userId = session()->get('id');
        $model = new UserModel();

        $data = $this->request->getPost();
        
        $updateData = [
            'full_name' => $data['full_name'],
            'phone'     => $data['phone']
        ];

        if (!empty($data['password'])) {
            if ($data['password'] === $data['confirm_password']) {
                $updateData['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Passwords do not match']);
            }
        }

        if ($model->update($userId, $updateData)) {
            // Update session
            session()->set('full_name', $updateData['full_name']);
            return $this->response->setJSON(['success' => true, 'message' => 'Profile updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update profile']);
        }
    }

    public function uploadProfilePic()
    {
        $userId = session()->get('id');
        $model = new UserModel();
        $user = $model->find($userId);

        $file = $this->request->getFile('profile_pic');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            
            // Ensure directory exists
            $uploadPath = FCPATH . 'public/images/uploads/profiles/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Delete old file if exists
            if ($user['profile_pic'] && file_exists(FCPATH . $user['profile_pic'])) {
                @unlink(FCPATH . $user['profile_pic']);
            }

            $file->move($uploadPath, $newName);
            $dbPath = 'public/images/uploads/profiles/' . $newName;

            $model->update($userId, ['profile_pic' => $dbPath]);
            session()->set('profile_pic', $dbPath);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Profile picture updated successfully',
                'path'    => base_url($dbPath)
            ]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Invalid file upload']);
    }

    public function support()
    {
        $userId = session()->get('id');
        $supportModel = new \App\Models\SupportModel();
        
        $requests = $supportModel->where('user_id', $userId)
                                ->orderBy('created_at', 'DESC')
                                ->findAll();

        $data = [
            'title'    => 'Student Support',
            'requests' => $requests
        ];
        return view('student/support', $data);
    }

    public function submitSupport()
    {
        $userId = session()->get('id');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        if (!$subject || !$message) {
            return redirect()->back()->with('error', 'Please fill in all fields.');
        }

        $supportModel = new \App\Models\SupportModel();
        $messageModel = new \App\Models\SupportMessageModel();

        $db = \Config\Database::connect();
        $db->transStart();

        $requestId = $supportModel->insert([
            'user_id' => $userId,
            'subject' => $subject,
            'message' => $message, // Keep for backward compatibility/summary
            'status'  => 'pending'
        ]);

        $messageModel->insert([
            'support_request_id' => $requestId,
            'sender_id'          => $userId,
            'sender_role'        => 'student',
            'message'            => $message
        ]);

        $db->transComplete();

        return redirect()->to(base_url('student/support'))->with('success', 'Support request submitted successfully!');
    }

    public function getSupportMessages($requestId)
    {
        $messageModel = new \App\Models\SupportMessageModel();
        $messages = $messageModel->where('support_request_id', $requestId)
                                 ->orderBy('created_at', 'ASC')
                                 ->findAll();
        return $this->response->setJSON(['status' => true, 'data' => $messages]);
    }

    // ==========================================
    // MOCK TESTS & UNIT TESTS
    // ==========================================

    public function mockTests()
    {
        $userId = session()->get('id');
        $mockTestModel = new \App\Models\MockTestModel();
        $accessibleTests = $mockTestModel->getAccessibleTests($userId);

        $data = [
            'title'     => 'Mock Tests',
            'mockTests' => $accessibleTests
        ];
        return view('student/mock_tests', $data);
    }

    public function unitTests()
    {
        $userId = session()->get('id');
        $unitTestModel = new \App\Models\UnitTestModel();
        $moduleModel = new \App\Models\ModuleModel();
        
        // For unit tests, we'll show all active ones for now, 
        // or filter by enrolled course modules if needed.
        $unitTests = $unitTestModel->where('is_active', 1)->findAll();

        $data = [
            'title'     => 'Unit Tests',
            'unitTests' => $unitTests
        ];
        return view('student/unit_tests', $data);
    }

    public function startTest($type, $id)
    {
        $userId = session()->get('id');
        $data = [
            'title' => 'Taking Test',
            'type'  => $type,
            'id'    => $id
        ];

        if ($type === 'mock') {
            $testModel = new \App\Models\MockTestModel();
            $questionModel = new \App\Models\MockTestQuestionModel();
            $accessModel = new \App\Models\UserAccessibleTestModel();

            if (!$accessModel->hasMockTestAccess($userId, $id)) {
                return redirect()->to(base_url('student/mock-tests'))->with('error', 'You do not have access to this test.');
            }

            $data['test'] = $testModel->find($id);
            $data['questions'] = $questionModel->getByTest($id);
        } else {
            $testModel = new \App\Models\UnitTestModel();
            $questionModel = new \App\Models\UnitTestQuestionModel();

            $data['test'] = $testModel->find($id);
            $data['questions'] = $questionModel->getByTest($id);
        }

        if (empty($data['test']) || empty($data['questions'])) {
            return redirect()->back()->with('error', 'Test not found or has no questions.');
        }

        return view('student/take_test', $data);
    }

    public function submitTest()
    {
        $userId = session()->get('id');
        $testType = $this->request->getPost('test_type');
        $testId = $this->request->getPost('test_id');
        $userAnswers = $this->request->getPost('answers') ?? []; // [question_id => answer_index]

        if ($testType === 'mock') {
            $testModel = new \App\Models\MockTestModel();
            $questionModel = new \App\Models\MockTestQuestionModel();
            $answerModel = new \App\Models\MockTestUserAnswerModel();
            $resultModel = new \App\Models\ResultModel();

            $test = $testModel->find($testId);
            $questions = $questionModel->where('mock_test_id', $testId)->findAll();
            
            $totalQuestions = count($questions);
            $correctCount = 0;

            foreach ($questions as $q) {
                $submittedAnswer = $userAnswers[$q['id']] ?? null;
                $isCorrect = ($submittedAnswer !== null && $submittedAnswer == $q['correct_option']);
                
                if ($isCorrect) $correctCount++;

                // Save individual answer
                $answerModel->insert([
                    'user_id'         => $userId,
                    'mock_test_id'    => $testId,
                    'question_id'     => $q['id'],
                    'selected_option' => $submittedAnswer,
                    'is_correct'      => $isCorrect ? 1 : 0
                ]);
            }

            $score = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;
            
            // Save summary result
            $resultModel->insert([
                'user_id'      => $userId,
                'subject'      => "Mock Test: " . ($test['title'] ?? "Untitied"),
                'score'        => $correctCount,
                'total_points' => $totalQuestions,
                'exam_date'    => date('Y-m-d')
            ]);

            return redirect()->to(base_url('student/results'))->with('success', "Mock Test submitted! You scored $correctCount out of $totalQuestions (" . round($score, 2) . "%).");
        } else {
            // Unit Test submission logic
            $testModel = new \App\Models\UnitTestModel();
            $questionModel = new \App\Models\UnitTestQuestionModel();
            $answerModel = new \App\Models\UnitTestUserAnswerModel();
            $resultModel = new \App\Models\ResultModel();

            $test = $testModel->find($testId);
            $questions = $questionModel->where('unit_test_id', $testId)->findAll();
            
            $totalQuestions = count($questions);
            $correctCount = 0;

            foreach ($questions as $q) {
                $submittedAnswer = $userAnswers[$q['id']] ?? null;
                $isCorrect = ($submittedAnswer !== null && $submittedAnswer == $q['correct_option']);
                if ($isCorrect) {
                    $correctCount++;
                }

                // Save individual answer
                $answerModel->insert([
                    'user_id'         => $userId,
                    'unit_test_id'    => $testId,
                    'question_id'     => $q['id'],
                    'selected_option' => $submittedAnswer,
                    'is_correct'      => $isCorrect ? 1 : 0
                ]);
            }

            // Save summary result
            $resultModel->insert([
                'user_id'      => $userId,
                'subject'      => "Unit Test: " . ($test['title'] ?? "Untitied"),
                'score'        => $correctCount,
                'total_points' => $totalQuestions,
                'exam_date'    => date('Y-m-d')
            ]);

            return redirect()->to(base_url('student/results'))->with('success', "Unit Test submitted! You scored $correctCount out of $totalQuestions.");
        }
    }
}
