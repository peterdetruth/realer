<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PositionModel;

class PositionController extends BaseController
{
    protected $positionModel;

    public function __construct()
    {
        $this->positionModel = new PositionModel();
    }

    // Display all positions
    public function index()
    {
        $positions = $this->positionModel->orderBy('table_order')->findAll();

        return view('admin/positions/index', [
            'title' => 'Manage Positions',
            'positions' => $positions
        ]);
    }

    // Show create form
    public function create()
    {
        return view('admin/positions/create', [
            'title' => 'Add Position'
        ]);
    }

    // Save new position
    public function store()
    {
        $data = $this->request->getPost([
            'table_order',
            'title',
            'salary',
            'duties',
            'requirements'
        ]);

        $this->positionModel->insert($data);
        return redirect()->to('/admin/positions')->with('success', 'Position added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $position = $this->positionModel->find($id);

        if (!$position) {
            return redirect()->to('/admin/positions')->with('error', 'Position not found');
        }

        return view('admin/positions/edit', [
            'title' => 'Edit Position',
            'position' => $position
        ]);
    }

    // Update position
    public function update($id)
    {
        $data = $this->request->getPost([
            'table_order',
            'title',
            'salary',
            'duties',
            'requirements'
        ]);

        $this->positionModel->update($id, $data);
        return redirect()->to('/admin/positions')->with('success', 'Position updated successfully');
    }

    // Delete position
    public function delete($id)
    {
        $this->positionModel->delete($id);
        return redirect()->to('/admin/positions')->with('success', 'Position deleted successfully');
    }
}
