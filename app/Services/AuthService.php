<?php

namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Attempt to login a user
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return false;
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return false;
        }

        // Optional: check if user is active
        if ($user['status'] !== 'active') {
            return false;
        }

        // Map role_id to string role
        $roles = [
            1 => 'admin',
            2 => 'staff',
            3 => 'user',
        ];

        $roleName = $roles[$user['role_id']] ?? 'user';

        // Store session
        $session = session();
        $session->set([
            'isLoggedIn' => true,
            'role'       => $roleName,
            'email'      => $user['email'],
            'user_id'    => $user['id'],
        ]);

        return true;
    }
    /**
     * Logout the current user
     */
    public function logout(): void
    {
        session()->destroy();
    }

    /**
     * Check if a user is logged in
     */
    public function isLoggedIn(): bool
    {
        return session()->get('isLoggedIn') === true;
    }

    /**
     * Get the current user's info
     */
    public function currentUser(): array|null
    {
        if (!$this->isLoggedIn()) {
            return null;
        }

        return [
            'id'   => session()->get('user_id'),
            'name' => session()->get('user_name'),
            'role' => session()->get('role'),
        ];
    }

    /**
     * Get role name from role ID
     */
    protected function getRoleName(int $roleId): string
    {
        $roles = [
            1 => 'admin',
            2 => 'staff',
            3 => 'user'
        ];

        return $roles[$roleId] ?? 'user';
    }
}
