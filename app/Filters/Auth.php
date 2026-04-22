<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // ✅ Redirect to login if not logged in
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // ✅ If roles are specified, check against user's role
        if ($arguments && is_array($arguments)) {
            $userRole = session()->get('designation');

            if (! in_array($userRole, $arguments)) {
                return redirect()->to(base_url());
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing needed
    }
}
