<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useTimestamps = true; // created_at, updated_at
    protected $returnType    = 'array'; // return results as arrays
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role_id',
        'status'
    ];

    // Optional: protect password from mass assignment if needed
    // protected $protectFields = true;

    /**
     * Find user by email
     *
     * @param string $email
     * @return array|null
     */
    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Verify user password
     *
     * @param array $user
     * @param string $password
     * @return bool
     */
    public function verifyPassword(array $user, string $password): bool
    {
        return password_verify($password, $user['password']);
    }
}
