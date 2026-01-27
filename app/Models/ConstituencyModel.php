<?php

namespace App\Models;

use CodeIgniter\Model;

class ConstituencyModel extends Model
{
    protected $table      = 'constituencies';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'county_id',
        'name'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'array';

    /**
     * Get constituencies by county
     */
    public function getByCounty($countyId)
    {
        return $this->where('county_id', $countyId)->findAll();
    }
}
