<?php

namespace App\Controllers;

class WebSiteController extends BaseController
{
    public function index(): string
    {
        $blogModel = new \App\Models\BlogModel();
        $data = [
            'latest_blogs' => $blogModel->where('status', 'published')->orderBy('created_at', 'DESC')->limit(3)->findAll()
        ];
        return view('website/home_main', $data);
    }

    public function CMA()
    {
        return view('website/CMA_main');
    }

    public function EA()
    {
        $testModel = new \App\Models\TestimonialModel();
        $data = [
            'testimonials' => $testModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('website/EA_main', $data);
    }

    public function AI()
    {
        $blogModel = new \App\Models\BlogModel();
        $data = [
            'latest_blogs' => $blogModel->where('status', 'published')->orderBy('created_at', 'DESC')->limit(3)->findAll()
        ];
        return view('website/AI_main', $data);
    }

    public function EA1()
    {
        $blogModel = new \App\Models\BlogModel();
        $data = [
            'latest_blogs' => $blogModel->where('status', 'published')->orderBy('created_at', 'DESC')->limit(3)->findAll()
        ];
        return view('website/EA_main1', $data);
    }


    public function resources()
    {
        $blogModel = new \App\Models\BlogModel();
        $data = [
            'latest_blogs' => $blogModel->where('status', 'published')->orderBy('created_at', 'DESC')->limit(3)->findAll()
        ];
        return view('website/Resources_main', $data);
    }

    public function talent()
    {
        $testModel = new \App\Models\TestimonialModel();
        $data = [
            'testimonials' => $testModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('website/Talent_main', $data);
    }

    public function blogs()
    {
        $blogModel = new \App\Models\BlogModel();
        
        // Fetch 4 random blogs for the Popular section
        $popular = $blogModel->where('status', 'published')
                             ->orderBy('RAND()')
                             ->limit(4)
                             ->findAll();
        
        // Fetch paginated blogs for the Latest section
        $data = [
            'popular' => $popular,
            'blogs'   => $blogModel->where('status', 'published')
                                 ->orderBy('created_at', 'DESC')
                                 ->paginate(6),
            'pager'   => $blogModel->pager
        ];
        return view('website/Blogs_main', $data);
    }

    public function blogView($slug)
    {
        $blogModel = new \App\Models\BlogModel();
        $blog = $blogModel->where('slug', $slug)->first();
        
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'blog' => $blog,
            // Fetch recent blogs for sidebar
            'recent_blogs' => $blogModel->where('status', 'published')
                                       ->where('id !=', $blog['id'])
                                       ->orderBy('created_at', 'DESC')
                                       ->limit(3)
                                       ->findAll()
        ];
        return view('website/blog_view', $data);
    }
}
