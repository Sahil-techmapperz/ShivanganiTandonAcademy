<?php

namespace App\Controllers;

use App\Models\BlogModel;

class AdminBlogController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Blogs',
            'blogs' => $this->blogModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/blogs/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Blog'
        ];
        return view('admin/blogs/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'   => 'required|min_length[3]',
            'content' => 'required',
            'author'  => 'required',
            'status'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $image = $this->request->getFile('image');
        $imagePath = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'public/uploads/blogs', $newName);
            $imagePath = 'public/uploads/blogs/' . $newName;
        }

        $this->blogModel->insert([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'author'  => $this->request->getPost('author'),
            'status'  => $this->request->getPost('status'),
            'image'   => $imagePath
        ]);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Blog post created successfully');
    }

    public function edit($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Blog post not found');
        }

        $data = [
            'title' => 'Edit Blog',
            'blog'  => $blog
        ];
        return view('admin/blogs/edit', $data);
    }

    public function update($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Blog post not found');
        }

        $rules = [
            'title'   => 'required|min_length[3]',
            'content' => 'required',
            'author'  => 'required',
            'status'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $image = $this->request->getFile('image');
        $imagePath = $blog['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Delete old image if exists
            if ($imagePath && file_exists(FCPATH . $imagePath)) {
                @unlink(FCPATH . $imagePath);
            }
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'public/uploads/blogs', $newName);
            $imagePath = 'public/uploads/blogs/' . $newName;
        }

        $this->blogModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'author'  => $this->request->getPost('author'),
            'status'  => $this->request->getPost('status'),
            'image'   => $imagePath
        ]);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Blog post updated successfully');
    }

    public function delete($id)
    {
        $blog = $this->blogModel->find($id);
        if ($blog) {
            if ($blog['image'] && file_exists(FCPATH . $blog['image'])) {
                @unlink(FCPATH . $blog['image']);
            }
            $this->blogModel->delete($id);
            return redirect()->to(base_url('admin/blogs'))->with('success', 'Blog post deleted successfully');
        }
        return redirect()->to(base_url('admin/blogs'))->with('error', 'Failed to delete blog post');
    }
}
