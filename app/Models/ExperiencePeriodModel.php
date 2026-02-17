<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperiencePeriodModel extends Model
{
    protected $table = 'experience_periods';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'label',
        'sort_order',
        'is_active'
    ];

    protected $useTimestamps = true;
}
