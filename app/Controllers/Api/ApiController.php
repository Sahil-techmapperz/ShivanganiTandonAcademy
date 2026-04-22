<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ContactUsModel;
use App\Models\InquiryModel;
use App\Models\QuoteModel;
use App\Models\QueryFormModel;
use App\Models\TblScoresModel;
use App\Models\AdminModel;


class ApiController extends ResourceController
{
    protected $modelName = ContactUsModel::class;
    protected $format = 'JSON';

    // GET /api/usa_journey
    public function usa_journey()
    {
        $usa_journey = $this->model->orderBy('id', 'DESC')->findAll();

        return $this->respond([
            'status' => true,
            'message' => 'usa_journey retrieved successfully',
            'data' => $usa_journey
        ]);
    }


    // DELETE /api/usa_journey/{id}
    public function delete_usa_journey($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('USA Journey Request not found');
        }

        $this->model->delete($id);

        return $this->respond([
            'status' => true,
            'message' => 'USA Journey Request deleted successfully'
        ]);
    }



    public function submitUSAJourneyForm()
    {
        // ✅ Get request
        $request = service('request');

        // ✅ Get FormData
        $post = $request->getPost();

        // ✅ Extract values
        $name       = trim($post['name'] ?? '');
        $email      = trim($post['email'] ?? '');
        $phone      = trim($post['phone'] ?? '');
        $location   = trim($post['location'] ?? '');
        $profession = trim($post['profession'] ?? '');

        // ✅ Validation
        if (!$name || !$email || !$phone || !$location) {
            return $this->response->setJSON([
                'status'  => 400,
                'message' => 'All fields are required'
            ]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'status'  => 400,
                'message' => 'Invalid email format'
            ]);
        }

        // ✅ Load Model
        $contactModel = new ContactUsModel();

        // ✅ Insert Data
        $contactModel->insert([
            'name'        => $name,
            'email'       => $email,
            'phone'       => $phone,
            'location'    => $location,
            'profession'  => $profession,
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        // ✅ Response
        return $this->response->setJSON([
            'status'  => 200,
            'message' => 'Form submitted successfully'
        ]);
    }



    // GET /api/help_request
    public function help_request()
    {
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('contact_messages'); // ✅ SAME TABLE

            $help_request = $builder
                ->orderBy('id', 'DESC')
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'help request retrieved successfully',
                'data'    => $help_request
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to fetch data'
            ])->setStatusCode(500);
        }
    }

    public function delete_help_request($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'ID is required'
                ])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            $builder = $db->table('contact_messages');

            // Check if record exists
            $existing = $builder->where('id', $id)->get()->getRow();

            if (!$existing) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Record not found'
                ])->setStatusCode(404);
            }

            // Delete record
            $builder->where('id', $id)->delete();

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Delete failed'
            ])->setStatusCode(500);
        }
    }

    public function submitHelp()
    {
        try {
            // ✅ FIXED: get JSON manually
            $data = json_decode(file_get_contents('php://input'), true);

            $name    = trim($data['name'] ?? '');
            $phone   = trim($data['phone'] ?? '');
            $email   = trim($data['email'] ?? '');
            $message = trim($data['message'] ?? '');

            // ✅ Validation
            if (empty($name) || empty($email)) {
                return $this->response->setJSON([
                    'status'  => "error",
                    'message' => 'Name and Email are required'
                ])->setStatusCode(400);
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'status'  => "error",
                    'message' => 'Invalid email format'
                ])->setStatusCode(400);
            }

            // ✅ DB Insert
            $db = \Config\Database::connect();
            $builder = $db->table('contact_messages');

            $builder->insert([
                'name'       => $name,
                'phone'      => $phone,
                'email'      => $email,
                'message'    => $message,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON([
                'status'  => "success",
                'message' => 'Message submitted successfully'
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status'  => "error",
                'message' => 'Server error'
            ])->setStatusCode(500);
        }
    }


    public function demo_request()
    {
        try {
            $db = \Config\Database::connect();
            
            // Fetch from tbl_enrollments
            $query1 = $db->table('tbl_enrollments e')
                ->select('e.id, u.full_name, u.email, u.phone, c.title as course_name, e.progress, e.status, e.enrolled_at, "enrollment" as source, e.message')
                ->join('tbl_users u', 'u.id = e.user_id')
                ->join('tbl_courses c', 'c.id = e.course_id');

            // Fetch from modal_form_data
            $query2 = $db->table('modal_form_data m')
                ->select('m.id, m.full_name, m.email, m.phone, c.title as course_name, 0 as progress, "pending" as status, m.created_at as enrolled_at, "lead" as source, m.message')
                ->join('tbl_courses c', 'c.id = m.course_id', 'left');

            $data1 = $query1->get()->getResultArray();
            $data2 = $query2->get()->getResultArray();

            $combined = array_merge($data1, $data2);

            // Sort by enrolled_at DESC
            usort($combined, function($a, $b) {
                return strtotime($b['enrolled_at']) - strtotime($a['enrolled_at']);
            });

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Enrollments and Leads retrieved successfully',
                'data'    => $combined
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['status' => false, 'message' => 'Failed to fetch data'])->setStatusCode(500);
        }
    }

    public function delete_demo_request($id = null)
    {
        try {
            $source = $this->request->getGet('source') ?? 'enrollment';
            if (!$id) {
                return $this->response->setJSON(['status' => false, 'message' => 'ID is required'])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            if ($source === 'enrollment') {
                $db->table('tbl_enrollments')->where('id', $id)->delete();
            } else {
                $db->table('modal_form_data')->where('id', $id)->delete();
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Record terminated/deleted successfully'
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['status' => false, 'message' => 'Operation failed'])->setStatusCode(500);
        }
    }

    public function updateEnrollmentStatus($id = null)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $status = $data['status'] ?? 'enrolled';
            $source = $this->request->getGet('source') ?? 'enrollment';

            if (!$id) {
                return $this->response->setJSON(['status' => false, 'message' => 'ID is required'])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            
            if ($source === 'enrollment') {
                $updateData = ['status' => $status];
                if ($status === 'enrolled') {
                    $updateData['enrolled_at'] = date('Y-m-d H:i:s');
                }
                $db->table('tbl_enrollments')->where('id', $id)->update($updateData);
            } else {
                if ($status === 'rejected') {
                    $db->table('modal_form_data')->where('id', $id)->delete();
                    return $this->response->setJSON(['status' => true, 'message' => 'Lead rejected and removed.']);
                }
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Cannot change status of a guest lead. Please ask the student to Sign Up first.'
                ]);
            }

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Status updated to ' . ucfirst($status) . ' successfully!'
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['status' => false, 'message' => 'Update failed'])->setStatusCode(500);
        }
    }

    public function modalFormSubmit()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $name    = trim($data['name'] ?? '');
            $email   = trim($data['email'] ?? '');
            $phone   = trim($data['phone'] ?? '');
            $course  = trim($data['course'] ?? '');
            $message = trim($data['message'] ?? '');

            if (empty($name) || empty($email) || empty($phone) || empty($message)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'All fields are required'])->setStatusCode(400);
            }

            $courseMap = [
                'EA'  => 1,
                'CMA' => 2,
                'AI'  => 3,
                'Other' => null
            ];
            $courseId = $courseMap[$course] ?? null;

            $db = \Config\Database::connect();
            $user = $db->table('tbl_users')->where('email', $email)->get()->getRow();

            if ($user && $courseId) {
                $exists = $db->table('tbl_enrollments')->where(['user_id' => $user->id, 'course_id' => $courseId])->get()->getRow();
                if (!$exists) {
                    $db->table('tbl_enrollments')->insert([
                        'user_id'     => $user->id,
                        'course_id'   => $courseId,
                        'progress'    => 0,
                        'status'      => 'pending',
                        'message'     => $message,
                        'enrolled_at' => date('Y-m-d H:i:s')
                    ]);
                }
            } else {
                $db->table('modal_form_data')->insert([
                    'full_name'   => $name,
                    'email'       => $email,
                    'phone'       => $phone,
                    'message'     => $message,
                    'course_id'   => $courseId,
                    'created_at'  => date('Y-m-d H:i:s')
                ]);
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Your enrollment request has been submitted successfully! Our team will review and approve it shortly.'
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Server error'])->setStatusCode(500);
        }
    }




    // GET /api/hiring_request
    public function hiring_request()
    {
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('hiring_requests'); // ✅ SAME TABLE

            $hiring_requests = $builder
                ->orderBy('id', 'DESC')
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Hiring Request retrieved successfully',
                'data'    => $hiring_requests
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to fetch data'
            ])->setStatusCode(500);
        }
    }


    public function delete_hiring_request($id = null)
    {
        try {
            if (!$id) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'ID is required'
                ])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            $builder = $db->table('hiring_requests');

            // Check if record exists
            $existing = $builder->where('id', $id)->get()->getRow();

            if (!$existing) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Record not found'
                ])->setStatusCode(404);
            }

            // Delete record
            $builder->where('id', $id)->delete();

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Delete failed'
            ])->setStatusCode(500);
        }
    }

    public function submitHiring()
    {
        try {
            // ✅ Get JSON input (your method)
            $data = json_decode(file_get_contents('php://input'), true);

            // ✅ Extract values
            $organisation = trim($data['organisation_name'] ?? '');
            $phone        = trim($data['contact_number'] ?? '');
            $name         = trim($data['full_name'] ?? '');
            $email        = trim($data['email'] ?? '');
            $type         = trim($data['requirement_type'] ?? '');
            $skills       = trim($data['skills'] ?? '');
            $message      = trim($data['message'] ?? '');

            // ✅ Validation: required
            if (
                empty($organisation) || empty($phone) ||
                empty($name) || empty($email) || empty($type)
            ) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Required fields missing'
                ])->setStatusCode(400);
            }

            // ✅ Email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Invalid email'
                ])->setStatusCode(400);
            }

            // ✅ Phone validation (10–15 digits allowed)
            if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Invalid phone number'
                ])->setStatusCode(400);
            }

            // ✅ DB Insert
            $db = \Config\Database::connect();
            $builder = $db->table('hiring_requests');

            $builder->insert([
                'organisation_name' => $organisation,
                'contact_number'    => $phone,
                'full_name'         => $name,
                'email'             => $email,
                'requirement_type'  => $type,
                'skills'            => $skills,
                'message'           => $message,
                'created_at'        => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Hiring request submitted'
            ]);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Server error'
            ])->setStatusCode(500);
        }
    }



    // DELETE /api/usa_journey/{id}
    public function delete_query_request($id = null)
    {
        $querymodel = new QueryFormModel();

        // Check if ID is provided
        if ($id === null) {
            return $this->fail('No ID provided');
        }

        // Find the record
        $data = $querymodel->find($id);

        if (!$data) {
            return $this->failNotFound('Record not found');
        }

        // Delete the record
        if ($querymodel->delete($id)) {
            return $this->respondDeleted([
                'status' => 200,
                'message' => 'Record deleted successfully'
            ]);
        } else {
            return $this->fail('Failed to delete record');
        }
    }


    // GET /api/query
    public function query_request()
    {
        $querymodel = new QueryFormModel();

        try {
            $queries = $querymodel->orderBy('id', 'DESC')->findAll();

            if (empty($queries)) {
                return $this->respond([
                    'status' => false,
                    'message' => 'No queries found',
                    'data' => []
                ], 200);
            }

            return $this->respond([
                'status' => true,
                'message' => 'Queries retrieved successfully',
                'data' => $queries
            ], 200);
        } catch (\Exception $e) {
            return $this->failServerError('Something went wrong: ' . $e->getMessage());
        }
    }



    public function submit_Query_form()
    {
        // ✅ Get request
        $request = service('request');

        // ✅ Get FormData
        $post = $request->getPost();

        // ✅ Extract values
        $first_name = trim($post['first_name'] ?? '');
        $last_name  = trim($post['last_name'] ?? '');
        $email      = trim($post['email'] ?? '');
        $phone      = trim($post['phone'] ?? '');
        $query      = trim($post['query'] ?? '');

        // ✅ Validation
        if (!$first_name || !$last_name || !$email || !$phone || !$query) {
            return $this->response->setJSON([
                'status'  => 400,
                'message' => 'All fields are required'
            ]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'status'  => 400,
                'message' => 'Invalid email format'
            ]);
        }

        // ✅ Load Model
        $QueryFormModel = new QueryFormModel();

        // ✅ Insert Data
        $QueryFormModel->insert([
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
            'phone'      => $phone,
            'query'      => $query,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // ✅ Response
        return $this->response->setJSON([
            'status'  => 200,
            'message' => 'Form submitted successfully'
        ]);
    }



    // DELETE /api/usa_journey/{id}
    public function delete_inquiry_request($id = null)
    {
        $InquiryModel = new InquiryModel();


        // Check if ID is provided
        if ($id === null) {
            return $this->fail('No ID provided');
        }

        // Find the record
        $data = $InquiryModel->find($id);

        if (!$data) {
            return $this->failNotFound('Record not found');
        }

        // Delete the record
        if ($InquiryModel->delete($id)) {
            return $this->respondDeleted([
                'status' => 200,
                'message' => 'Record deleted successfully'
            ]);
        } else {
            return $this->fail('Failed to delete record');
        }
    }


    // GET /api/query
    public function inquiry_request()
    {
        $InquiryModel = new InquiryModel();

        try {
            $queries = $InquiryModel->orderBy('id', 'DESC')->findAll();

            if (empty($queries)) {
                return $this->respond([
                    'status' => false,
                    'message' => 'No queries found',
                    'data' => []
                ], 200);
            }

            return $this->respond([
                'status' => true,
                'message' => 'Queries retrieved successfully',
                'data' => $queries
            ], 200);
        } catch (\Exception $e) {
            return $this->failServerError('Something went wrong: ' . $e->getMessage());
        }
    }



    public function submit_inquiry_request()
    {
        // ✅ Get request
        $request = service('request');

        // ✅ Get FormData
        $post = $request->getPost();

        // ✅ Extract values
        $first_name = trim($post['first_name'] ?? '');
        $last_name  = trim($post['last_name'] ?? '');
        $mobile      = trim($post['mobile'] ?? '');
        $current_status      = trim($post['current_status'] ?? '');
        $area_of_interest      = trim($post['area_of_interest'] ?? '');
        $query      = trim($post['query'] ?? '');

        // ✅ Validation
        if (!$first_name || !$last_name || !$mobile || !$current_status || !$area_of_interest || !$query) {
            return $this->response->setJSON([
                'status'  => 400,
                'message' => 'All fields are required'
            ]);
        }

        // ✅ Load Model
        $InquiryModel = new InquiryModel();

        // ✅ Insert Data
        $InquiryModel->insert([
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'mobile'      => $mobile,
            'current_status'      => $current_status,
            'area_of_interest'      => $area_of_interest,
            'query'      => $query,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // ✅ Response
        return $this->response->setJSON([
            'status'  => 200,
            'message' => 'Form submitted successfully'
        ]);
    }


    public function scores()
    {
        $TblScoresModel = new TblScoresModel();

        try {
            $scores = $TblScoresModel->orderBy('id', 'DESC')->findAll();

            if (empty($scores)) {
                return $this->respond([
                    'status' => false,
                    'message' => 'No scores found',
                    'data' => []
                ], 200);
            }

            return $this->respond([
                'status' => true,
                'message' => 'scores retrieved successfully',
                'data' => $scores
            ], 200);
        } catch (\Exception $e) {
            return $this->failServerError('Something went wrong: ' . $e->getMessage());
        }
    }


    public function delete_scores($id = null)
    {
        $TblScoresModel = new TblScoresModel();


        // Check if ID is provided
        if ($id === null) {
            return $this->fail('No ID provided');
        }

        // Find the record
        $data = $TblScoresModel->find($id);

        if (!$data) {
            return $this->failNotFound('Record not found');
        }

        // Delete the record
        if ($TblScoresModel->delete($id)) {
            return $this->respondDeleted([
                'status' => 200,
                'message' => 'Record deleted successfully'
            ]);
        } else {
            return $this->fail('Failed to delete record');
        }
    }

    public function uploadScores()
    {
        $request = \Config\Services::request();
        $files   = $request->getFiles();

        if (!isset($files['images'])) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'No images uploaded'
            ]);
        }

        $model = new TblScoresModel();
        $uploaded = [];

        foreach ($files['images'] as $file) {

            if (!$file->isValid()) continue;

            if (!in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp'])) continue;

            // ✅ Step 1: Insert empty record first (to get ID)
            $model->insert([
                'image' => '',
            ]);

            $insertId = $model->getInsertID();

            // ✅ Step 2: Create filename using ID
            $extension = $file->getExtension();
            $fileName  = $insertId . '.' . $extension;

            // ✅ Step 3: Define your custom path
            $path = FCPATH . 'public/images/talent/RealResult_talent/';

            // create folder if not exists
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // ✅ Step 4: Move file
            $file->move($path, $fileName);

            // ✅ Step 5: Update DB with filename
            $model->update($insertId, [
                'image' => $fileName
            ]);

            $uploaded[] = $fileName;
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Images uploaded successfully',
            'data' => $uploaded
        ]);
    }

    public function register()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $name = trim($data['name'] ?? '');
            $email = trim($data['email'] ?? '');
            $password = trim($data['password'] ?? '');

            if (empty($name) || empty($email) || empty($password)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'All fields are required'
                ]);
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid email format'
                ]);
            }

            $model = new AdminModel();
            
            // Check if user exists
            if ($model->where('email', $email)->first()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Email already registered'
                ]);
            }

            $model->insert([
                'full_name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registration successful! You can now login.'
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Server error occurred'
            ]);
        }
    }

    public function getSupportRequests()
    {
        $supportModel = new \App\Models\SupportModel();
        $requests = $supportModel->select('tbl_support_requests.*, tbl_users.full_name as student_name, tbl_users.email as student_email')
                                ->join('tbl_users', 'tbl_users.id = tbl_support_requests.user_id')
                                ->orderBy('tbl_support_requests.created_at', 'DESC')
                                ->findAll();
        return $this->response->setJSON([
            'status' => true,
            'data'   => $requests
        ]);
    }

    public function updateSupportStatus($id)
    {
        $status = $this->request->getPost('status');
        $reply = $this->request->getPost('reply');
        $supportModel = new \App\Models\SupportModel();
        
        $data = ['status' => $status];
        if ($reply !== null && trim($reply) !== '') {
            $data['admin_reply'] = $reply;
            
            // Add to conversation history
            $messageModel = new \App\Models\SupportMessageModel();
            $messageModel->insert([
                'support_request_id' => $id,
                'sender_id'          => 1, // Admin ID
                'sender_role'        => 'admin',
                'message'            => $reply
            ]);
        }
        
        if ($supportModel->update($id, $data)) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function addSupportMessage()
    {
        $requestId = $this->request->getPost('support_request_id');
        $message = $this->request->getPost('message');
        $role = $this->request->getPost('role') ?? 'student';
        $userId = session()->get('id');

        if (!$requestId || !$message) {
            return $this->response->setJSON(['success' => false, 'message' => 'Missing data']);
        }

        $messageModel = new \App\Models\SupportMessageModel();
        $messageModel->insert([
            'support_request_id' => $requestId,
            'sender_id'          => $userId,
            'sender_role'        => $role,
            'message'            => $message
        ]);

        // If it's a student message, update status to pending
        if ($role == 'student') {
            $supportModel = new \App\Models\SupportModel();
            $supportModel->update($requestId, ['status' => 'pending']);
        }

        return $this->response->setJSON(['success' => true]);
    }

    public function getSupportMessages($requestId)
    {
        $messageModel = new \App\Models\SupportMessageModel();
        $messages = $messageModel->where('support_request_id', $requestId)
                                 ->orderBy('created_at', 'ASC')
                                 ->findAll();
        return $this->response->setJSON(['status' => true, 'data' => $messages]);
    }
}
