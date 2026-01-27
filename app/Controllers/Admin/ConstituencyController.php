<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ConstituencyModel;
use App\Models\CountyModel;

class ConstituencyController extends BaseController
{
    protected $constituencyModel;
    protected $countyModel;

    public function __construct()
    {
        $this->constituencyModel = new ConstituencyModel();
        $this->countyModel       = new CountyModel();
    }

    public function index()
    {
        $data['constituencies'] = $this->constituencyModel
            ->select('constituencies.*, counties.name AS county_name')
            ->join('counties', 'counties.id = constituencies.county_id')
            ->findAll();

        return view('admin/constituencies/index', $data);
    }

    public function create()
    {
        $data['counties'] = $this->countyModel->findAll();
        return view('admin/constituencies/create', $data);
    }

    public function store()
    {
        $this->validate([
            'county_id' => 'required',
            'name'      => 'required|min_length[3]'
        ]);

        $this->constituencyModel->save([
            'county_id' => $this->request->getPost('county_id'),
            'name'      => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/constituencies')
            ->with('success', 'Constituency added successfully');
    }

    public function edit($id)
    {
        $data['constituency'] = $this->constituencyModel->find($id);

        if (!$data['constituency']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Constituency not found');
        }

        $data['counties'] = $this->countyModel->findAll();

        return view('admin/constituencies/edit', $data);
    }

    public function update($id)
    {
        $this->validate([
            'county_id' => 'required',
            'name'      => 'required|min_length[3]'
        ]);

        $this->constituencyModel->update($id, [
            'county_id' => $this->request->getPost('county_id'),
            'name'      => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/constituencies')
            ->with('success', 'Constituency updated successfully');
    }

    public function delete($id)
    {
        $this->constituencyModel->delete($id);

        return redirect()->to('/admin/constituencies')
            ->with('success', 'Constituency deleted successfully');
    }
}
