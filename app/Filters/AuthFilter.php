<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        // Check role if argument passed
        if ($arguments) {
            $allowedRoles = is_array($arguments) ? $arguments : $arguments;

            if (!in_array($session->get('role'), $allowedRoles)) {
                // Redirect to dashboard if role not allowed
                return redirect()->to('/dashboard')->with('error', 'You do not have permission to access this page.');
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after request
    }
}
