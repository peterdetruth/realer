<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StaffController extends BaseController
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Staff Area | Kennie',
            'message' => 'Welcome to Staff Area!'
        ]);
    }
}
