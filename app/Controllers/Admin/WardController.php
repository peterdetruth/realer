<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WardModel;
use App\Models\ConstituencyModel;
use App\Models\CountyModel;

class WardController extends BaseController
{
    protected $wardModel;
    protected $constituencyModel;
    protected $countyModel;

    public function __construct()
    {
        $this->wardModel          = new WardModel();
        $this->constituencyModel  = new ConstituencyModel();
        $this->countyModel        = new CountyModel();
    }

    public function index()
    {
        $data['wards'] = $this->wardModel
            ->select('
                wards.*,
                constituencies.name AS constituency_name,
                counties.name AS county_name
            ')
            ->join('constituencies', 'constituencies.id = wards.constituency_id')
            ->join('counties', 'counties.id = constituencies.county_id')
            ->findAll();

        return view('admin/wards/index', $data);
    }

    public function create()
    {
        $data['constituencies'] = $this->constituencyModel
            ->select('constituencies.*, counties.name AS county_name')
            ->join('counties', 'counties.id = constituencies.county_id')
            ->findAll();

        return view('admin/wards/create', $data);
    }

    public function store()
    {
        $this->validate([
            'constituency_id' => 'required',
            'name'            => 'required|min_length[2]'
        ]);

        $this->wardModel->save([
            'constituency_id' => $this->request->getPost('constituency_id'),
            'name'            => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/wards')
            ->with('success', 'Ward added successfully');
    }

    public function edit($id)
    {
        $data['ward'] = $this->wardModel->find($id);

        if (!$data['ward']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ward not found');
        }

        $data['constituencies'] = $this->constituencyModel
            ->select('constituencies.*, counties.name AS county_name')
            ->join('counties', 'counties.id = constituencies.county_id')
            ->findAll();

        return view('admin/wards/edit', $data);
    }

    public function update($id)
    {
        $this->validate([
            'constituency_id' => 'required',
            'name'            => 'required|min_length[2]'
        ]);

        $this->wardModel->update($id, [
            'constituency_id' => $this->request->getPost('constituency_id'),
            'name'            => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/wards')
            ->with('success', 'Ward updated successfully');
    }

    public function delete($id)
    {
        $this->wardModel->delete($id);

        return redirect()->to('/admin/wards')
            ->with('success', 'Ward deleted successfully');
    }
}
