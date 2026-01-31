<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EducationLevelModel;

class EducationLevelController extends BaseController
{
    protected $educationLevelModel;

    public function __construct()
    {
        $this->educationLevelModel = new EducationLevelModel();
    }

    public function index()
    {
        $levels = $this->educationLevelModel
            ->orderBy('category', 'ASC')
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('admin/education_levels/index', [
            'title'  => 'Education Levels',
            'levels' => $levels
        ]);
    }

    public function create()
    {
        return view('admin/education_levels/create', [
            'title' => 'Add Education Level'
        ]);
    }

    public function store()
    {
        $this->educationLevelModel->save([
            'name'       => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to('/admin/education-levels')
            ->with('success', 'Education level added successfully');
    }

    public function edit($id)
    {
        return view('admin/education_levels/edit', [
            'title' => 'Edit Education Level',
            'level' => $this->educationLevelModel->find($id)
        ]);
    }

    public function update($id)
    {
        $this->educationLevelModel->update($id, [
            'name'       => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to('/admin/education-levels')
            ->with('success', 'Education level updated successfully');
    }

    public function delete($id)
    {
        $this->educationLevelModel->delete($id);

        return redirect()->to('/admin/education-levels')
            ->with('success', 'Education level deleted successfully');
    }
}
