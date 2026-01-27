<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\CountyModel;

class UserProfileController extends BaseController
{
    protected $userModel;
    protected $profileModel;
    protected $countyModel;

    public function __construct()
    {
        $this->profileModel = new UserProfileModel();
        $this->countyModel  = new CountyModel();
        $this->userModel    = new UserModel();
    }

    /**
     * Show profile form (Step 2)
     */
    public function index()
    {
        $userId = session()->get('user_id');

        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to('/logout');
        }

        $data = [
            'email'    => $user['email'],
            'profile'  => $this->profileModel->getByUserId($userId),
            'counties' => $this->countyModel->orderBy('name', 'ASC')->findAll()
        ];

        return view('profile/index', $data);
    }


    /**
     * Store or update profile
     */
    public function store()
    {
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        if (!$user) {
            return redirect()->to('/logout');
        }

        $rules = [
            'first_name'          => 'required|min_length[2]',
            'middle_name'           => 'permit_empty|min_length[2]',
            'last_name'           => 'required|min_length[2]',
            'date_of_birth'       => 'required',
            'gender'              => 'required|in_list[male,female]',
            'phone'               => 'required|min_length[9]',
            'document_type'       => 'required|in_list[id,passport]',
            'document_number'     => 'required',
            'home_county_id'      => 'required|numeric',
            'home_constituency_id' => 'required|numeric',
            'home_ward_id'        => 'required|numeric',
            'is_pwd'              => 'required|in_list[yes,no]',
            'disability_type' => 'permit_empty|in_list[physical,visual,hearing,memory,other]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $payload = [
            'user_id'               => $userId,
            'email' => $user['email'],
            'first_name'            => $this->request->getPost('first_name'),
            'middle_name'           => $this->request->getPost('middle_name'),
            'last_name'             => $this->request->getPost('last_name'),
            'date_of_birth'         => $this->request->getPost('date_of_birth'),
            'gender'                => $this->request->getPost('gender'),
            'phone'                 => $this->request->getPost('phone'),
            'country'               => 'Kenya',
            'document_type'         => $this->request->getPost('document_type'),
            'document_number'       => $this->request->getPost('document_number'),
            'home_county_id'        => $this->request->getPost('home_county_id'),
            'home_constituency_id'  => $this->request->getPost('home_constituency_id'),
            'home_ward_id'          => $this->request->getPost('home_ward_id'),
            'is_pwd'                => $this->request->getPost('is_pwd'),
            'disability_type'       => $this->request->getPost('disability_type')
        ];

        // Upsert logic
        $existing = $this->profileModel->getByUserId($userId);

        if ($existing) {
            $this->profileModel->update($existing['id'], $payload);
        } else {
            $this->profileModel->insert($payload);
        }

        return redirect()->to('/profile/step3');
    }
}
