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
        $data['work_experiences'] = $this->workModel->findAll();
        $data['periods'] = $this->periodModel->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/work_experience/index', $data);
    }
}
