<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table      = 'user_profiles';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'country',
        'document_type',
        'document_number',
        'home_county_id',
        'home_constituency_id',
        'home_ward_id',
        'is_pwd',
        'disability_type'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'array';

    /**
     * Get profile by user ID
     */
    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }
}
