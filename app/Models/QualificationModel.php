<?php

namespace App\Models;

use CodeIgniter\Model;

class QualificationModel extends Model
{
    protected $table = 'qualifications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'education_level_id',
        'name',
        'sort_order',
        'is_active'
    ];
    protected $useTimestamps = true;
}
