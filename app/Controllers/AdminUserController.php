<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminUserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Users',
            'users' => $this->userModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New User'
        ];
        return view('admin/users/create', $data);
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email|is_unique[tbl_users.email]',
            'phone'     => 'required|min_length[10]',
            'password'  => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $profilePic = $this->request->getFile('profile_pic');
        $profilePicPath = null;

        if ($profilePic && $profilePic->isValid() && !$profilePic->hasMoved()) {
            $newName = $profilePic->getRandomName();
            $profilePic->move(FCPATH . 'public/uploads/users', $newName);
            $profilePicPath = 'public/uploads/users/' . $newName;
        }

        $this->userModel->insert([
            'full_name'   => $this->request->getPost('full_name'),
            'email'       => $this->request->getPost('email'),
            'phone'       => $this->request->getPost('phone'),
            'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'profile_pic' => $profilePicPath
        ]);

        return redirect()->to(base_url('admin/users'))->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'User not found');
        }

        $data = [
            'title' => 'Edit User',
            'user'  => $user
        ];
        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'User not found');
        }

        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => "required|valid_email|is_unique[tbl_users.email,id,{$id}]",
            'phone'     => 'required|min_length[10]',
        ];

        // Password is only required if provided
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $profilePic = $this->request->getFile('profile_pic');
        $profilePicPath = $user['profile_pic'];

        if ($profilePic && $profilePic->isValid() && !$profilePic->hasMoved()) {
            // Delete old image if exists
            if ($profilePicPath && file_exists(FCPATH . $profilePicPath)) {
                @unlink(FCPATH . $profilePicPath);
            }
            $newName = $profilePic->getRandomName();
            $profilePic->move(FCPATH . 'public/uploads/users', $newName);
            $profilePicPath = 'public/uploads/users/' . $newName;
        }

        $updateData = [
            'full_name'   => $this->request->getPost('full_name'),
            'email'       => $this->request->getPost('email'),
            'phone'       => $this->request->getPost('phone'),
            'profile_pic' => $profilePicPath
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to(base_url('admin/users'))->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if ($user) {
            if ($user['profile_pic'] && file_exists(FCPATH . $user['profile_pic'])) {
                @unlink(FCPATH . $user['profile_pic']);
            }
            $this->userModel->delete($id);
            return redirect()->to(base_url('admin/users'))->with('success', 'User deleted successfully');
        }
        return redirect()->to(base_url('admin/users'))->with('error', 'Failed to delete user');
    }
}
