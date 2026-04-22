<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $db = \Config\Database::connect();
        
        // Basic Stats
        $total_students = $db->table('tbl_users')->countAllResults();
        $total_courses = $db->table('tbl_courses')->countAllResults();
        $pending_enroll = $db->table('tbl_enrollments')->where('status', 'pending')->countAllResults();
        $pending_support = $db->table('tbl_support_requests')->where('status', 'pending')->countAllResults();

        // Summary of other requests
        $usa_journey_count = $db->table('start_your_cma_journey_in_usa')->countAllResults();
        $hiring_count = $db->table('hiring_requests')->countAllResults();
        $help_count = $db->table('contact_messages')->countAllResults();
        $query_count = $db->table('query_forms')->countAllResults();
        $inquiry_count = $db->table('inquiries')->countAllResults();

        // Chart Data: Enrollments last 7 days
        $enrollment_trends = $db->table('tbl_enrollments')
            ->select("DATE_FORMAT(enrolled_at, '%Y-%m-%d') as date, COUNT(*) as count")
            ->where('enrolled_at >=', date('Y-m-d', strtotime('-6 days')))
            ->groupBy("DATE_FORMAT(enrolled_at, '%Y-%m-%d')")
            ->get()->getResultArray();

        // Chart Data: Registrations last 7 days
        $registration_trends = $db->table('tbl_users')
            ->select("DATE_FORMAT(created_at, '%Y-%m-%d') as date, COUNT(*) as count")
            ->where('created_at >=', date('Y-m-d', strtotime('-6 days')))
            ->groupBy("DATE_FORMAT(created_at, '%Y-%m-%d')")
            ->get()->getResultArray();

        // Fill missing dates with 0 for the last 7 days
        $dates = [];
        for ($i = 6; $i >= 0; $i--) {
            $dates[date('Y-m-d', strtotime("-$i days"))] = 0;
        }

        $enroll_data = $dates;
        foreach ($enrollment_trends as $row) {
            $enroll_data[$row['date']] = (int)$row['count'];
        }

        $reg_data = $dates;
        foreach ($registration_trends as $row) {
            $reg_data[$row['date']] = (int)$row['count'];
        }

        $data = [
            'total_students'    => $total_students,
            'total_courses'     => $total_courses,
            'pending_enroll'    => $pending_enroll,
            'pending_support'   => $pending_support,
            'usa_journey_count' => $usa_journey_count,
            'hiring_count'      => $hiring_count,
            'help_count'        => $help_count,
            'query_count'       => $query_count,
            'inquiry_count'     => $inquiry_count,
            'chart_dates'       => array_keys($dates),
            'enroll_trends'     => array_values($enroll_data),
            'reg_trends'        => array_values($reg_data),
            'recent_enroll'     => $db->table('tbl_enrollments e')
                                     ->select('e.*, u.full_name, c.title as course_name')
                                     ->join('tbl_users u', 'u.id = e.user_id')
                                     ->join('tbl_courses c', 'c.id = e.course_id')
                                     ->orderBy('e.enrolled_at', 'DESC')
                                     ->limit(5)
                                     ->get()
                                     ->getResultArray(),
            'recent_support'    => $db->table('tbl_support_requests s')
                                     ->select('s.*, u.full_name')
                                     ->join('tbl_users u', 'u.id = s.user_id')
                                     ->orderBy('s.created_at', 'DESC')
                                     ->limit(5)
                                     ->get()
                                     ->getResultArray()
        ];

        return view('admin/dashboard', $data);
    }

    public function usa_journey()
    {
        return view('admin/usa_journey'); // Make sure this view exists
    }

    public function help_request()
    {
        return view('admin/help_request'); // Make sure this view exists
    }

    public function demo_request()
    {
        return view('admin/enrollments');
    }

    public function support()
    {
        return view('admin/support');
    }

    public function hiring_request()
    {
        return view('admin/hiring_request'); // Make sure this view exists
    }

    public function query_request()
    {
        return view('admin/query_request'); // Make sure this view exists
    }

    public function inquiry_request()
    {
        return view('admin/inquiry_request'); // Make sure this view exists
    }

    public function scores()
    {
        return view('admin/scores'); // Make sure this view exists
    }

    public function settings()
    {
        $settingModel = new \App\Models\SettingModel();
        $allSettings = $settingModel->findAll();
        
        $settings = [];
        foreach ($allSettings as $s) {
            $settings[$s['key_name']] = $s['key_value'];
        }

        $data = [
            'settings' => $settings,
            'signature' => $settingModel->getSetting('director_signature')
        ];
        return view('admin/settings', $data);
    }

    public function updateSettings()
    {
        $settingModel = new \App\Models\SettingModel();
        $inputs = $this->request->getPost();
        
        // Whitelist of allowed setting keys
        $allowed = [
            'site_name', 'site_email', 'site_phone', 'site_address',
            'facebook_url', 'instagram_url', 'linkedin_url', 'youtube_url'
        ];

        foreach ($inputs as $key => $value) {
            if (in_array($key, $allowed)) {
                $settingModel->setSetting($key, $value);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function submissions()
    {
        $model = new \App\Models\ExamSubmissionModel();
        // Join with users and courses to get more detail
        $submissions = $model->select('tbl_exam_submissions.*, tbl_users.full_name as student_name, tbl_courses.title as course_name')
                            ->join('tbl_users', 'tbl_users.id = tbl_exam_submissions.user_id')
                            ->join('tbl_courses', 'tbl_courses.id = tbl_exam_submissions.course_id')
                            ->orderBy('tbl_exam_submissions.created_at', 'DESC')
                            ->findAll();

        $data = [
            'title'       => 'Exam Submissions',
            'submissions' => $submissions
        ];
        return view('admin/submissions', $data);
    }

    public function gradeSubmission()
    {
        $id = $this->request->getPost('id');
        $score = $this->request->getPost('score');

        if (!$id || $score === null) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing data']);
        }

        $model = new \App\Models\ExamSubmissionModel();
        $resultModel = new \App\Models\ResultModel();

        $submission = $model->find($id);
        if (!$submission) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Submission not found']);
        }

        // Update submission status
        $model->update($id, [
            'score'  => $score,
            'status' => 'graded'
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Submission graded successfully!']);
    }

    public function updateSignature()
    {
        $file = $this->request->getFile('signature');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'public/images/uploads/signatures/';
            
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $settingModel = new \App\Models\SettingModel();
            $current = $settingModel->getSetting('director_signature');
            
            // Delete old file if exists
            if ($current && $current['key_value'] && file_exists(FCPATH . $current['key_value'])) {
                @unlink(FCPATH . $current['key_value']);
            }

            $file->move($uploadPath, $newName);
            $dbPath = 'public/images/uploads/signatures/' . $newName;
            $settingModel->setSetting('director_signature', $dbPath);

            session()->setFlashdata('success', 'Signature updated successfully');
        } else {
            session()->setFlashdata('error', 'Invalid file upload');
        }

        return redirect()->to(base_url('admin/settings'));
    }

    // ==========================================
    // CURRICULUM MANAGEMENT
    // ==========================================

    public function courses()
    {
        $courseModel = new \App\Models\CourseModel();
        $data = [
            'title'   => 'Manage Courses',
            'courses' => $courseModel->findAll()
        ];
        return view('admin/courses/list', $data);
    }

    public function addCourse()
    {
        $title = $this->request->getPost('title');
        $desc = $this->request->getPost('description');
        $dur = $this->request->getPost('duration');
        
        $courseModel = new \App\Models\CourseModel();
        $courseModel->insert([
            'title'       => $title,
            'description' => $desc,
            'duration'    => $dur
        ]);

        return redirect()->to(base_url('admin/courses'))->with('success', 'Course added successfully');
    }

    public function manageLessons($courseId)
    {
        $courseModel = new \App\Models\CourseModel();
        $lessonModel = new \App\Models\LessonModel();
        $resourceModel = new \App\Models\ResourceModel();

        $course = $courseModel->find($courseId);
        if (!$course) return redirect()->to(base_url('admin/courses'));

        $lessons = $lessonModel->where('course_id', $courseId)->orderBy('sort_order', 'ASC')->findAll();
        
        // Fetch resources for each lesson
        foreach ($lessons as &$lesson) {
            $lesson['resources'] = $resourceModel->where('lesson_id', $lesson['id'])->findAll();
        }

        $data = [
            'title'   => 'Manage Lessons - ' . $course['title'],
            'course'  => $course,
            'lessons' => $lessons
        ];
        return view('admin/courses/manage_lessons', $data);
    }

    public function saveLesson()
    {
        $id = $this->request->getPost('id');
        $courseId = $this->request->getPost('course_id');
        $videoInput = $this->request->getPost('video_id');

        // Extract ID if a full YouTube URL is provided
        $videoId = $videoInput;
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoInput, $match)) {
            $videoId = $match[1];
        }

        $data = [
            'course_id'   => $courseId,
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'type'        => $this->request->getPost('type') ?? 'video',
            'video_id'    => $videoId,
            'duration'    => $this->request->getPost('duration'),
            'passing_score' => (int)($this->request->getPost('passing_score') ?? 0),
            'sort_order'  => (int)$this->request->getPost('sort_order')
        ];

        $lessonModel = new \App\Models\LessonModel();
        if ($id) {
            $lessonModel->update($id, $data);
            $msg = 'Lesson updated';
        } else {
            $lessonModel->insert($data);
            $msg = 'Lesson added';
        }

        return redirect()->to(base_url('admin/course/lessons/' . $courseId))->with('success', $msg);
    }

    public function deleteLesson($id)
    {
        $lessonModel = new \App\Models\LessonModel();
        $lesson = $lessonModel->find($id);
        if ($lesson) {
            $lessonModel->delete($id);
            return redirect()->to(base_url('admin/course/lessons/' . $lesson['course_id']))->with('success', 'Lesson deleted');
        }
        return redirect()->to(base_url('admin/courses'));
    }

    public function uploadResource()
    {
        $lessonId = $this->request->getPost('lesson_id');
        $courseId = $this->request->getPost('course_id');
        $file = $this->request->getFile('resource_file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = FCPATH . 'public/uploads/resources/';
            if (!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);

            // Capture info BEFORE moving
            $ext  = strtoupper($file->getExtension());
            $size = round($file->getSize() / 1024 / 1024, 2) . ' MB';
            $newName = $file->getRandomName();
            
            $file->move($uploadPath, $newName);

            $resourceModel = new \App\Models\ResourceModel();
            $resourceModel->insert([
                'lesson_id' => $lessonId,
                'file_name' => $this->request->getPost('file_name'),
                'file_type' => $ext,
                'file_path' => 'public/uploads/resources/' . $newName,
                'file_size' => $size
            ]);

            return redirect()->to(base_url('admin/course/lessons/' . $courseId))->with('success', 'Resource uploaded');
        }

        return redirect()->to(base_url('admin/course/lessons/' . $courseId))->with('error', 'Upload failed');
    }

    public function deleteResource($id)
    {
        $resourceModel = new \App\Models\ResourceModel();
        $resource = $resourceModel->find($id);
        if ($resource) {
            if (file_exists(FCPATH . $resource['file_path'])) {
                @unlink(FCPATH . $resource['file_path']);
            }
            $resourceModel->delete($id);
            return redirect()->back()->with('success', 'Resource deleted');
        }
        return redirect()->back();
    }

    // ASSESSMENT QUESTIONS
    public function manageQuestions($lessonId)
    {
        $lessonModel = new \App\Models\LessonModel();
        $courseModel = new \App\Models\CourseModel();
        $questionModel = new \App\Models\ExamQuestionModel();

        $lesson = $lessonModel->find($lessonId);
        if (!$lesson) return redirect()->to(base_url('admin/courses'));

        $course = $courseModel->find($lesson['course_id']);
        $questions = $questionModel->where('lesson_id', $lessonId)->findAll();

        $data = [
            'title'     => 'Manage Assessment - ' . $lesson['title'],
            'lesson'    => $lesson,
            'course'    => $course,
            'questions' => $questions
        ];
        return view('admin/courses/manage_questions', $data);
    }

    public function saveQuestion()
    {
        $lessonId = $this->request->getPost('lesson_id');
        $id = $this->request->getPost('id');
        
        $lessonModel = new \App\Models\LessonModel();
        $lesson = $lessonModel->find($lessonId);
        
        $options = $this->request->getPost('options');
        $data = [
            'lesson_id'      => $lessonId,
            'question_text'  => $this->request->getPost('question_text'),
            'question_type'  => $this->request->getPost('question_type'),
            'correct_option' => $this->request->getPost('correct_option'),
            'points'         => (int)($this->request->getPost('points') ?? 1),
            'options'        => !empty($options) ? json_encode(array_values($options)) : null
        ];

        // Handle Question Paper Upload (For Exams)
        $file = $this->request->getFile('question_paper');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = FCPATH . 'public/uploads/assessments/';
            if (!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $data['question_paper'] = 'public/uploads/assessments/' . $newName;
        }

        $questionModel = new \App\Models\ExamQuestionModel();
        
        // If it's an EXAM, we usually only want ONE assessment entry (the brief/paper)
        if ($lesson['type'] === 'exam' && !$id) {
            $existing = $questionModel->where('lesson_id', $lessonId)->first();
            if ($existing) $id = $existing['id'];
        }

        if ($id) {
            // Remove old paper if new one is uploaded
            if (isset($data['question_paper'])) {
                $old = $questionModel->find($id);
                if ($old && $old['question_paper'] && file_exists(FCPATH . $old['question_paper'])) {
                    @unlink(FCPATH . $old['question_paper']);
                }
            }
            $questionModel->update($id, $data);
            $msg = 'Assessment updated';
        } else {
            $questionModel->insert($data);
            $msg = 'Assessment added';
        }

        return redirect()->to(base_url('admin/lesson/questions/' . $lessonId))->with('success', $msg);
    }

    public function deleteQuestion($id)
    {
        $questionModel = new \App\Models\ExamQuestionModel();
        $question = $questionModel->find($id);
        if ($question) {
            $questionModel->delete($id);
            return redirect()->back()->with('success', 'Question deleted');
        }
        return redirect()->back();
    }

    // ==========================================
    // ANNOUNCEMENT MANAGEMENT
    // ==========================================

    public function announcements()
    {
        $announcementModel = new \App\Models\AnnouncementModel();
        $userModel = new \App\Models\UserModel();

        // Fetch announcements with student name if individual
        $announcements = $announcementModel->select('tbl_announcements.*, tbl_users.full_name as student_name')
                                          ->join('tbl_users', 'tbl_users.id = tbl_announcements.student_id', 'left')
                                          ->orderBy('created_at', 'DESC')
                                          ->findAll();

        $students = $userModel->findAll();

        $data = [
            'title'         => 'Manage Announcements',
            'announcements' => $announcements,
            'students'      => $students
        ];
        return view('admin/announcements', $data);
    }

    public function saveAnnouncement()
    {
        $id = $this->request->getPost('id');
        $targetType = $this->request->getPost('target_type');
        $studentId = ($targetType === 'individual') ? $this->request->getPost('student_id') : null;

        $data = [
            'title'       => $this->request->getPost('title'),
            'content'     => $this->request->getPost('content'),
            'type'        => $this->request->getPost('type') ?? 'info',
            'target_type' => $targetType,
            'student_id'  => $studentId,
        ];

        $announcementModel = new \App\Models\AnnouncementModel();
        if ($id) {
            $announcementModel->update($id, $data);
            $msg = 'Announcement updated';
        } else {
            $announcementModel->insert($data);
            $msg = 'Announcement sent successfully';
        }

        return redirect()->to(base_url('admin/announcements'))->with('success', $msg);
    }

    public function deleteAnnouncement($id)
    {
        $announcementModel = new \App\Models\AnnouncementModel();
        if ($announcementModel->delete($id)) {
            return redirect()->to(base_url('admin/announcements'))->with('success', 'Announcement deleted');
        }
        return redirect()->to(base_url('admin/announcements'))->with('error', 'Failed to delete announcement');
    }
}
