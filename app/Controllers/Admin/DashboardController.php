<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CountyModel;
use App\Models\ConstituencyModel;
use App\Models\WardModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $countyModel = new CountyModel();
        $constituencyModel = new ConstituencyModel();
        $wardModel = new WardModel();

        $data = [
            'totalUsers' => $userModel->countAllResults(),
            'totalCounties' => $countyModel->countAllResults(),
            'totalConstituencies' => $constituencyModel->countAllResults(),
            'totalWards' => $wardModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}
