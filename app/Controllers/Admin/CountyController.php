<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CountyModel;

class CountyController extends BaseController
{
    protected $countyModel;

    public function __construct()
    {
        $this->countyModel = new CountyModel();
    }

    public function index()
    {
        $data['counties'] = $this->countyModel->findAll();
        return view('admin/counties/index', $data);
    }

    public function create()
    {
        return view('admin/counties/create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min_length[3]'
        ]);

        $this->countyModel->save([
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/counties')->with('success', 'County added successfully');
    }

    public function edit($id)
    {
        $data['county'] = $this->countyModel->find($id);

        if (!$data['county']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('County not found');
        }

        return view('admin/counties/edit', $data);
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|min_length[3]'
        ]);

        $this->countyModel->update($id, [
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/counties')->with('success', 'County updated successfully');
    }

    public function delete($id)
    {
        $this->countyModel->delete($id);
        return redirect()->to('/admin/counties')->with('success', 'County deleted successfully');
    }
}
