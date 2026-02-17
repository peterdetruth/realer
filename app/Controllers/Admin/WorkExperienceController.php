<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WorkExperienceModel;
use App\Models\ExperiencePeriodModel;

class WorkExperienceController extends BaseController
{
    protected $workModel;
    protected $periodModel;

    public function __construct()
    {
        $this->workModel = new WorkExperienceModel();
        $this->periodModel = new ExperiencePeriodModel();
    }

    public function index()
    {
        return view('admin/work_experience/index', [
            'work_experiences' => $this->workModel->findAll(),
            'periods' => $this->periodModel->orderBy('sort_order', 'ASC')->findAll()
        ]);
    }

    /* ================= WORK EXPERIENCE ================= */

    public function createWork()
    {
        $this->workModel->save([
            'name' => $this->request->getPost('name'),
            'is_active' => 1
        ]);

        return redirect()->back();
    }

    public function updateWork($id)
    {
        $this->workModel->update($id, [
            'name' => $this->request->getPost('name'),
            'is_active' => $this->request->getPost('is_active') ?? 0
        ]);

        return redirect()->back();
    }

    public function deleteWork($id)
    {
        $this->workModel->delete($id);
        return redirect()->back();
    }

    /* ================= EXPERIENCE PERIOD ================= */

    public function createPeriod()
    {
        $this->periodModel->save([
            'label' => $this->request->getPost('label'),
            'sort_order' => $this->request->getPost('sort_order') ?? 0,
            'is_active' => 1
        ]);

        return redirect()->back();
    }

    public function updatePeriod($id)
    {
        $this->periodModel->update($id, [
            'label' => $this->request->getPost('label'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_active' => $this->request->getPost('is_active') ?? 0
        ]);

        return redirect()->back();
    }

    public function deletePeriod($id)
    {
        $this->periodModel->delete($id);
        return redirect()->back();
    }
}
