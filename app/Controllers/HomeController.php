<?php

namespace App\Controllers;

use App\Models\PositionModel;

class HomeController extends BaseController
{
    public function index()
    {
        $positionModel = new PositionModel();

        $data['positions'] = $positionModel
            ->orderBy('table_order', 'ASC')
            ->findAll();

        return view('home', $data);
    }
}
