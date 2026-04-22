<?php

namespace App\Controllers;

use App\Models\TestimonialModel;
use CodeIgniter\Controller;

class AdminTestimonialController extends BaseController
{
    public function index()
    {
        $model = new TestimonialModel();
        $data = [
            'title'        => 'Manage Student Testimonials',
            'testimonials' => $model->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/testimonials/index', $data);
    }

    public function create()
    {
        return view('admin/testimonials/create', ['title' => 'Add New Testimonial']);
    }

    public function store()
    {
        $model = new TestimonialModel();
        
        $file = $this->request->getFile('thumbnail');
        $thumbPath = null;
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads/testimonials/', $newName);
            $thumbPath = 'public/uploads/testimonials/' . $newName;
        }

        $data = [
            'student_name' => $this->request->getPost('student_name'),
            'youtube_id'   => $this->request->getPost('youtube_id'),
            'thumbnail'    => $thumbPath
        ];

        $model->insert($data);
        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial added successfully');
    }

    public function edit($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);
        
        if (!$testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found');
        }

        return view('admin/testimonials/edit', [
            'title'       => 'Edit Testimonial',
            'testimonial' => $testimonial
        ]);
    }

    public function update($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);
        
        $data = [
            'student_name' => $this->request->getPost('student_name'),
            'youtube_id'   => $this->request->getPost('youtube_id')
        ];

        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($testimonial['thumbnail'] && file_exists(FCPATH . $testimonial['thumbnail'])) {
                @unlink(FCPATH . $testimonial['thumbnail']);
            }
            
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads/testimonials/', $newName);
            $data['thumbnail'] = 'public/uploads/testimonials/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial updated successfully');
    }

    public function delete($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);
        
        if ($testimonial) {
            if ($testimonial['thumbnail'] && file_exists(FCPATH . $testimonial['thumbnail'])) {
                @unlink(FCPATH . $testimonial['thumbnail']);
            }
            $model->delete($id);
            return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial deleted successfully');
        }
        
        return redirect()->to(base_url('admin/testimonials'))->with('error', 'Failed to delete');
    }
}
