<?php

namespace App\Controllers;

use App\Services\AuthService;

class TestAuth extends BaseController
{
    public function login()
    {
        $auth = new AuthService();

        if ($auth->login('admin@kennie.local', 'admin123')) {
            return "Login successful! User: " . session()->get('user_name');
        }

        return "Login failed!";
    }

    public function logout()
    {
        $auth = new AuthService();
        $auth->logout();
        return "Logged out!";
    }
}
