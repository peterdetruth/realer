<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationLevelModel extends Model
{
    protected $table = 'education_levels';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'category',
        'sort_order',
        'is_active'
    ];

    protected $useTimestamps = true;
}
