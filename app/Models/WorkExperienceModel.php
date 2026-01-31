<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkExperienceModel extends Model
{
    protected $table = 'work_experiences';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'is_active'
    ];
    protected $useTimestamps = true; // Automatically handles created_at and updated_at
}
