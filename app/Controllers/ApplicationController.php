<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\PositionModel;
use App\Models\CountyModel;
use App\Models\ConstituencyModel;
use App\Models\WardModel;
use App\Models\EducationLevelModel;
use App\Models\QualificationModel;
use App\Models\WorkExperienceModel;

class ApplicationController extends BaseController
{
    protected $applicationModel;
    protected $positionModel;
    protected $countyModel;
    protected $constituencyModel;
    protected $wardModel;
    protected $educationLevelModel;
    protected $qualificationModel;
    protected $workExperienceModel;

    public function __construct()
    {
        $this->applicationModel = new ApplicationModel();
        $this->positionModel = new PositionModel();
        $this->countyModel = new CountyModel();
        $this->constituencyModel = new ConstituencyModel();
        $this->wardModel = new WardModel();
        $this->educationLevelModel = new EducationLevelModel();
        $this->qualificationModel = new QualificationModel();
        $this->workExperienceModel = new WorkExperienceModel();
    }

    public function create()
    {
        return view('application/create', [
            'positions' => $this->positionModel->orderBy('table_order', 'ASC')->findAll(),
            'counties' => $this->countyModel->findAll(),
            'education_levels' => $this->educationLevelModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll(),
            'work_experiences' => $this->workExperienceModel->where('is_active', 1)->findAll(),
        ]);
    }

    public function store()
    {
        $user_id = session()->get('user_id');

        $data = $this->request->getPost([
            'position_id',
            'county_id',
            'constituency_id',
            'ward_id',
            'primary_education_level_id',
            'primary_qualification_id',
            'secondary_education_level_id',
            'secondary_qualification_id',
            'tertiary_education_level_id',
            'tertiary_qualification_id',
            'work_experience_id',
            'work_experience_period',
        ]);

        $data['user_id'] = $user_id;

        $this->applicationModel->save($data);

        return redirect()->to('/')->with('success', 'Application submitted successfully.');
    }

    public function constituencies($county_id)
    {
        $data = $this->constituencyModel
            ->where('county_id', $county_id)
            ->orderBy('name', 'ASC')
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function wards($constituency_id)
    {
        $data = $this->wardModel
            ->where('constituency_id', $constituency_id)
            ->orderBy('name', 'ASC')
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function qualifications($education_level_id)
    {
        $data = $this->qualificationModel
            ->where('education_level_id', $education_level_id)
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return $this->response->setJSON($data);
    }
}
