<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AuthController extends BaseController
{
    // Show login page
    public function index()
    {
        return $this->login();
    }

    // Show signup form
    public function signup()
    {
        return view('auth/signup');
    }

    // Handle signup POST
    public function registerPost()
    {
        $data = $this->request->getJSON(true);
        
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email|is_unique[tbl_users.email]|is_unique[tbl_admins.email]',
            'password'  => 'required|min_length[6]',
            'phone'     => 'permit_empty|min_length[10]'
        ];

        $errors = [
            'email' => [
                'is_unique' => 'This email address is already registered.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => implode(' ', $this->validator->getErrors())
            ]);
        }

        $studentModel = new \App\Models\StudentModel();
        
        $userData = [
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'] ?? null,
            'password'  => $data['password'], // StudentModel handles hashing
        ];

        if ($studentModel->insert($userData)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registration successful! You can now login.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to register. Please try again.'
            ]);
        }
    }


    // Show login form
    public function login()
    {
        // Force logout if already logged in
        if (session()->get('isLoggedIn')) {
            session()->destroy();
        }

        return view('auth/login');
    }

    // Handle login via JSON POST (email + password)
    public function loginPost()
    {
        if (session()->get('isLoggedIn')) {
            $redirect = session()->get('designation') == 'admin' ? 'admin/dashboard' : 'student/dashboard';
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Already logged in',
                'email'    => session()->get('email'),
                'id'       => session()->get('id'),
                'redirect' => base_url($redirect)
            ]);
        }

        $data     = $this->request->getJSON(true);
        $email    = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        if (!$email || !$password) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Email and password are required'
            ]);
        }

        // Try Admin first
        $adminModel = new \App\Models\AdminModel();
        $user  = $adminModel->where('email', $email)->first();
        $role = 'admin';

        if (!$user) {
            // Try Student
            $studentModel = new \App\Models\StudentModel();
            $user = $studentModel->where('email', $email)->first();
            $role = 'student';
        }

        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found'
            ]);
        }

        if (!password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid password'
            ]);
        }

        session()->set([
            'id'          => $user['id'],
            'email'       => $user['email'],
            'full_name'   => $user['full_name'] ?? ($role == 'admin' ? 'Admin' : 'Student'),
            'phone'       => $user['phone'] ?? '',
            'profile_pic' => $user['profile_pic'] ?? '',
            'designation' => $role,
            'isLoggedIn'  => true,
        ]);

        $redirect = $role == 'admin' ? 'admin/dashboard' : 'student/dashboard';

        return $this->response->setJSON([
            'success'  => true,
            'message'  => 'Login successful',
            'email'    => $user['email'],
            'id'       => $user['id'],
            'redirect' => base_url($redirect)
        ]);
    }

    // Logout and destroy session
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    // Optional: Change password form
    public function changePasswordForm()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        return view('auth/change_password'); // Create this view if needed
    }

    // Show forgot password form
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    // Handle forgot password POST
    public function forgotPasswordPost()
    {
        $data  = $this->request->getJSON(true);
        $email = $data['email'] ?? '';

        if (!$email) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Email is required'
            ]);
        }

        $adminModel = new \App\Models\AdminModel();
        $studentModel = new \App\Models\StudentModel();

        $user = $adminModel->where('email', $email)->first();
        $role = 'admin';

        if (!$user) {
            $user = $studentModel->where('email', $email)->first();
            $role = 'student';
        }

        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'user doesnot exist please register'
            ]);
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        
        session()->set([
            'reset_email' => $email,
            'reset_otp'   => $otp,
            'reset_role'  => $role
        ]);

        // Send Email
        $emailService = \Config\Services::email();
        
        $emailService->setFrom('no-reply@shivanganitandonacademy.com', 'Shivangani Tandon Academy');
        $emailService->setTo($email);
        $emailService->setSubject('Password Reset OTP');
        
        $message = "
        <h2>Password Reset Request</h2>
        <p>Hello,</p>
        <p>You requested to reset your password. Here is your 6-digit OTP:</p>
        <h3 style='background:#f4f4f4;padding:10px;display:inline-block;letter-spacing:2px;'>{$otp}</h3>
        <p>This OTP is valid for your current session.</p>
        <p>If you didn't request this, please ignore this email.</p>
        <br>
        <p>Regards,<br>Shivangani Tandon Academy</p>
        ";
        
        $emailService->setMessage($message);
        
        if ($emailService->send()) {
            return $this->response->setJSON([
                'success' => true,
                'mocked'  => false,
                'message' => 'OTP has been sent to your email address.'
            ]);
        } else {
            // Uncomment the line below to debug email sending errors if needed
            // $error = $emailService->printDebugger(['headers']);
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to send email. Please try again later.'
            ]);
        }
    }

    // Show reset password form
    public function resetPassword()
    {
        if (!session()->has('reset_email')) {
            return redirect()->to(base_url('forgot-password'));
        }
        return view('auth/reset_password');
    }

    // Handle reset password POST
    public function resetPasswordPost()
    {
        $data     = $this->request->getJSON(true);
        $otp      = $data['otp'] ?? '';
        $password = $data['password'] ?? '';

        $sessionOtp   = session()->get('reset_otp');
        $sessionEmail = session()->get('reset_email');
        $sessionRole  = session()->get('reset_role');

        if (!$sessionOtp || !$sessionEmail) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Session expired. Please request a new OTP.'
            ]);
        }

        if ($otp != $sessionOtp) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid OTP.'
            ]);
        }

        if (strlen($password) < 6) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Password must be at least 6 characters.'
            ]);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($sessionRole == 'admin') {
            $adminModel = new \App\Models\AdminModel();
            // Need ID to update
            $user = $adminModel->where('email', $sessionEmail)->first();
            if($user) {
                $adminModel->update($user['id'], ['password' => $hashedPassword]);
            }
        } else {
            $studentModel = new \App\Models\StudentModel();
            // Need ID to update
            $user = $studentModel->where('email', $sessionEmail)->first();
            if($user) {
                // Since StudentModel hashes passwords automatically, we need to bypass it or let it handle it.
                // StudentModel has a callback: beforeUpdate = ['hashPassword']. 
                // So if we pass raw password, it will hash it again.
                $studentModel->update($user['id'], ['password' => $password]);
            }
        }

        session()->remove(['reset_email', 'reset_otp', 'reset_role']);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Password reset successfully!'
        ]);
    }
}
