<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'position_id',
        'county_id',
        'constituency_id',
        'ward_id',
        'primary_education_level_id',
        'primary_qualification_id',
        'secondary_education_level_id',
        'secondary_qualification_id',
        'tertiary_education_level_id',
        'tertiary_qualification_id',
        'work_experience_id',
        'work_experience_period_id',
    ];
    protected $useTimestamps = true;
}
