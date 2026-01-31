<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EducationLevelModel;
use App\Models\QualificationModel;

class EducationLevelController extends BaseController
{
    protected $educationLevelModel;
    protected $qualificationModel;

    public function __construct()
    {
        $this->educationLevelModel = new EducationLevelModel();
        $this->qualificationModel = new QualificationModel();
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

    // Edit page
    public function edit($id)
    {
        $level = $this->educationLevelModel->find($id);

        // Get all qualifications for this level as one string (line by line)
        $qualifications = $this->qualificationModel
            ->where('education_level_id', $id)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $qualificationsText = '';
        if ($qualifications) {
            foreach ($qualifications as $q) {
                $qualificationsText .= $q['name'] . "\n";
            }
        }

        return view('admin/education_levels/edit', [
            'title' => 'Edit Education Level',
            'level' => $level,
            'qualificationsText' => $qualificationsText
        ]);
    }

    // Update method
    public function update($id)
    {
        // Update main education level info
        $levelData = [
            'name'       => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $this->educationLevelModel->update($id, $levelData);

        // Handle qualifications
        $qualifications = $this->request->getPost('qualifications');
        $qualLines = explode("\n", $qualifications);

        // Delete old qualifications
        $this->qualificationModel->where('education_level_id', $id)->delete();

        // Insert new qualifications
        foreach ($qualLines as $line) {
            $line = trim($line);
            if ($line !== '') {
                $this->qualificationModel->insert([
                    'education_level_id' => $id,
                    'name' => $line,
                    'sort_order' => 0,
                    'is_active' => 1
                ]);
            }
        }

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
