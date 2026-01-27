<?php

namespace App\Models;

use CodeIgniter\Model;

class WardModel extends Model
{
    protected $table      = 'wards';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'constituency_id',
        'name'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'array';

    /**
     * Get wards by constituency
     */
    public function getByConstituency($constituencyId)
    {
        return $this->where('constituency_id', $constituencyId)->findAll();
    }
}
