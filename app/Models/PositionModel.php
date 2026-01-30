<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table = 'positions';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'table_order',
        'title',
        'vacant_positions',
        'salary',
        'duties',
        'requirements'
    ];

    protected $useTimestamps = true;
}
