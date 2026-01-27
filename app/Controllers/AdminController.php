<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;

class AdminController extends BaseController
{
    protected UserModel $userModel;
    protected RoleModel $roleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    /**
     * List all users
     */
    public function index()
    {
        $users = $this->userModel->findAll();
        $roles = $this->roleModel->findAll();

        // Get current logged-in role
        $session = session();
        $currentRole = $session->get('role');

        return view('admin/users', [
            'title' => 'Admin Panel | User Management',
            'users' => $users,
            'roles' => $roles,
            'role'  => $currentRole, // pass role to view for conditional buttons
        ]);
    }


    /**
     * Update a user's role or status
     */
    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $this->userModel->update($id, [
            'role_id' => $this->request->getPost('role_id'),
            'status'  => $this->request->getPost('status'),
        ]);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Show form to create a new user
     */
    public function createUserForm()
    {
        $roles = $this->roleModel->findAll();

        return view('admin/create_user', [
            'title' => 'Create New User | Admin Panel',
            'roles' => $roles
        ]);
    }

    /**
     * Handle new user creation
     */
    public function createUser()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role_id'  => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $this->userModel->insert([
            'name'     => explode('@', $this->request->getPost('email'))[0],
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'  => $this->request->getPost('role_id'),
            'status'   => 'active'
        ]);

        return redirect()->to('/admin')->with('success', 'New user created successfully.');
    }

    /**
     * Show edit user form
     */
    public function editUserForm($id)
    {
        $user = $this->userModel->find($id);
        $roles = $this->roleModel->findAll();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin/edit_user', [
            'title' => 'Edit User | Admin Panel',
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Handle edit submission
     */
    public function updateUser($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'email'   => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'role_id' => 'required|integer',
            'status'  => 'required'
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $updateData = [
            'email'   => $this->request->getPost('email'),
            'role_id' => $this->request->getPost('role_id'),
            'status'  => $this->request->getPost('status'),
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to('/admin')->with('success', 'User updated successfully.');
    }

    /**
     * Delete user
     */
    public function deleteUser($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $this->userModel->delete($id);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
