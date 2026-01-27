<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Services\AuthService;

class LoginController extends BaseController
{
    protected AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Show login form
     */
    public function index()
    {
        // If already logged in, redirect to dashboard
        if ($this->authService->isLoggedIn()) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login', [
            'title' => 'Login | Kennie',
        ]);
    }

    /**
     * Handle login form submission
     */
    public function attempt()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($this->authService->login($email, $password)) {
            session()->setFlashdata('success', 'Login successful!');

            // Redirect based on role
            $role = session()->get('role');
            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif ($role === 'staff') {
                return redirect()->to('/staff');
            } else {
                return redirect()->to('/dashboard'); // user dashboard
            }
        }

        // Failed login → flash message
        return redirect()->back()->withInput()->with('error', 'Invalid credentials or account inactive.');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out.');
    }
}
