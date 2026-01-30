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

    // ✅ NEW METHOD
    public function viewPosition($id)
    {
        $positionModel = new PositionModel();

        $position = $positionModel->find($id);

        if (!$position) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Position not found');
        }

        return view('positions/view', [
            'position' => $position
        ]);
    }
}
