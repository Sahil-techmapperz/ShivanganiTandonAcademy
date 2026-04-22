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
            'email'     => 'required|valid_email|is_unique[tbl_users.email]',
            'password'  => 'required|min_length[6]',
            'phone'     => 'permit_empty|min_length[10]'
        ];

        if (!$this->validate($rules)) {
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
}
