<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Show registration form
     */
    public function index()
    {
        return view('auth/register', [
            'title' => 'Account Sign Up | Kennie'
        ]);
    }

    /**
     * Handle registration submission
     */
    public function create()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        // Create user
        $this->userModel->insert([
            'name'      => explode('@', $this->request->getPost('email'))[0], // simple name
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'   => 3, // default role = user
            'status'    => 'active',
        ]);

        return redirect()->to('/auth/login')->with('success', 'Account created successfully! Please login.');
    }
}
