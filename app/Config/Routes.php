<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'WebSiteController::index');
$routes->get('home', 'WebSiteController::index');
$routes->get('EA1', 'WebSiteController::EA1');
$routes->get('CMA', 'WebSiteController::CMA');
$routes->get('EA', 'WebSiteController::EA');
$routes->get('AI', 'WebSiteController::AI');
$routes->get('resources', 'WebSiteController::resources');
$routes->get('talent', 'WebSiteController::talent');
$routes->get('blogs', 'WebSiteController::blogs');
$routes->get('blog/(:segment)', 'WebSiteController::blogView/$1');

// Authentication Routes
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');
$routes->get('signup', 'AuthController::signup');
$routes->post('register', 'AuthController::registerPost');
$routes->get('logout', 'AuthController::logout');


// Admin routes with auth filter
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('usa_journey', 'AdminController::usa_journey');
    $routes->get('help_request', 'AdminController::help_request');
    $routes->get('enrollments', 'AdminController::demo_request');
    $routes->get('hiring_request', 'AdminController::hiring_request');
    $routes->get('query_request', 'AdminController::query_request');
    $routes->get('inquiry_request', 'AdminController::inquiry_request');
    $routes->get('scores', 'AdminController::scores');
    $routes->get('settings', 'AdminController::settings');
    $routes->post('updateSettings', 'AdminController::updateSettings');
    $routes->post('updateSignature', 'AdminController::updateSignature');
    $routes->get('submissions', 'AdminController::submissions');
    $routes->post('grade-submission', 'AdminController::gradeSubmission');
    
    // Announcement Management
    $routes->get('announcements', 'AdminController::announcements');
    $routes->post('announcement/save', 'AdminController::saveAnnouncement');
    $routes->get('announcement/delete/(:num)', 'AdminController::deleteAnnouncement/$1');
    $routes->get('support', 'AdminController::support');

    // Blog Management
    $routes->get('blogs', 'AdminBlogController::index');
    $routes->get('blogs/create', 'AdminBlogController::create');
    $routes->post('blogs/store', 'AdminBlogController::store');
    $routes->get('blogs/edit/(:num)', 'AdminBlogController::edit/$1');
    $routes->post('blogs/update/(:num)', 'AdminBlogController::update/$1');
    $routes->get('blogs/delete/(:num)', 'AdminBlogController::delete/$1');

    // Testimonial Management
    $routes->get('testimonials', 'AdminTestimonialController::index');
    $routes->get('testimonials/create', 'AdminTestimonialController::create');
    $routes->post('testimonials/store', 'AdminTestimonialController::store');
    $routes->get('testimonials/edit/(:num)', 'AdminTestimonialController::edit/$1');
    $routes->post('testimonials/update/(:num)', 'AdminTestimonialController::update/$1');
    $routes->get('testimonials/delete/(:num)', 'AdminTestimonialController::delete/$1');

    // Curriculum Management
    $routes->get('courses', 'AdminController::courses');
    $routes->post('add-course', 'AdminController::addCourse');
    $routes->get('course/lessons/(:num)', 'AdminController::manageLessons/$1');
    $routes->post('lesson/save', 'AdminController::saveLesson');
    $routes->get('lesson/delete/(:num)', 'AdminController::deleteLesson/$1');
    $routes->post('resource/upload', 'AdminController::uploadResource');
    $routes->get('resource/delete/(:num)', 'AdminController::deleteResource/$1');

    // Assessment Question Management
    $routes->get('lesson/questions/(:num)', 'AdminController::manageQuestions/$1');
    $routes->post('question/save', 'AdminController::saveQuestion');
    $routes->get('question/delete/(:num)', 'AdminController::deleteQuestion/$1');
});

// Student routes with auth filter
$routes->group('student', ['filter' => 'auth:student'], function ($routes) {
    $routes->get('dashboard', 'StudentDashboardController::dashboard');
    $routes->get('courses', 'StudentDashboardController::courses');
    $routes->get('profile', 'StudentDashboardController::profile');
    $routes->post('updateProfile', 'StudentDashboardController::updateProfile');
    $routes->post('uploadProfilePic', 'StudentDashboardController::uploadProfilePic');
    $routes->get('results', 'StudentDashboardController::results');
    
    // LMS Routes
    $routes->get('academy', 'StudentDashboardController::academy');
    $routes->post('enroll', 'StudentDashboardController::enroll');
    $routes->get('course/(:num)', 'StudentDashboardController::viewCourse/$1');
    $routes->get('resources/(:num)', 'StudentDashboardController::viewResources/$1');
    $routes->post('update-progress', 'StudentDashboardController::updateProgress');
    $routes->post('submit-exam', 'StudentDashboardController::submitExam');
    $routes->get('support', 'StudentDashboardController::support');
    $routes->get('support-messages/(:num)', 'StudentDashboardController::getSupportMessages/$1');
    $routes->post('submit-support', 'StudentDashboardController::submitSupport');
});


$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    // ======================
    // COMMON DYNAMIC DATA APIs
    // ======================
    $routes->get('usa_journey', 'ApiController::usa_journey');
    $routes->delete('usa_journey/(:num)', 'ApiController::delete_usa_journey/$1');

    $routes->get('help_request', 'ApiController::help_request');
    $routes->delete('help_request/(:num)', 'ApiController::delete_help_request/$1');


    $routes->get('enrollments', 'ApiController::demo_request');
    $routes->delete('enrollments/(:num)', 'ApiController::delete_demo_request/$1');
    $routes->post('update_enrollment_status/(:num)', 'ApiController::updateEnrollmentStatus/$1');


    $routes->get('hiring_request', 'ApiController::hiring_request');
    $routes->delete('hiring_request/(:num)', 'ApiController::delete_hiring_request/$1');

    $routes->get('query_request', 'ApiController::query_request');
    $routes->delete('query_request/(:num)', 'ApiController::delete_query_request/$1');

    $routes->get('inquiry_request', 'ApiController::inquiry_request');
    $routes->delete('inquiry_request/(:num)', 'ApiController::delete_inquiry_request/$1');


    $routes->get('scores', 'ApiController::scores');
    $routes->delete('scores/(:num)', 'ApiController::delete_scores/$1');
    $routes->post('upload-scores', 'ApiController::uploadScores');


    $routes->post('form_submit', 'ApiController::submitUSAJourneyForm');
    $routes->post('submitHelp', 'ApiController::submitHelp');
    $routes->post('modalFormSubmit', 'ApiController::modalFormSubmit');
    $routes->post('hiring_requests_form_submit', 'ApiController::submitHiring');
    $routes->post('submit_Query_form', 'ApiController::submit_Query_form');
    $routes->post('submit_inquiry_request', 'ApiController::submit_inquiry_request');
    $routes->post('register', 'ApiController::register');
    $routes->get('getSupportRequests', 'ApiController::getSupportRequests');
    $routes->get('getSupportMessages/(:num)', 'ApiController::getSupportMessages/$1');
    $routes->post('add_support_message', 'ApiController::addSupportMessage');
    $routes->post('update_support_status/(:num)', 'ApiController::updateSupportStatus/$1');
});

