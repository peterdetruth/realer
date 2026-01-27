<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use App\Models\ConstituencyModel;
use App\Models\WardModel;

class LocationController extends BaseController
{
    protected $constituencyModel;
    protected $wardModel;

    public function __construct()
    {
        $this->constituencyModel = new ConstituencyModel();
        $this->wardModel         = new WardModel();
    }

    /**
     * Get constituencies by county ID
     */
    public function getConstituencies($countyId)
    {
        $data = $this->constituencyModel
            ->where('county_id', $countyId)
            ->orderBy('name', 'ASC')
            ->findAll();

        return $this->response->setJSON($data);
    }

    /**
     * Get wards by constituency ID
     */
    public function getWards($constituencyId)
    {
        $data = $this->wardModel
            ->where('constituency_id', $constituencyId)
            ->orderBy('name', 'ASC')
            ->findAll();

        return $this->response->setJSON($data);
    }
}
