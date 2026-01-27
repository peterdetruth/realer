<?php

namespace App\Controllers;

use App\Models\UserModel;

class TestUser extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->findByEmail('admin@kennie.local');

        if (!$user) {
            return "User not found!";
        }

        if ($userModel->verifyPassword($user, 'admin123')) {
            return "Password verified!";
        }

        return "Password incorrect!";
    }
}
