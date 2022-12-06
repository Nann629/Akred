<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_kriteria;
use App\Models\MSub;

class Sub extends BaseController
{

    public function __construct()
    {
        $this->sub = new MSub();
        $this->model = new M_kriteria;
    }


    public function index()
    {
        $data = [
            'judul' => 'Sub',
            'sub' => $this->sub->getsub(),
            'kriteria' => $this->model->getAllData()
        ];
        return view('/sub/index.php', $data);
    }

    public function tambah()
    {
        # code...
        // $data = 
        $this->sub->save([
            'deskripsi' => $this->request->getVar('deskripsi'),
            'idkriteria' => $this->request->getPost('idkriteria')
        ]);
        // dd($data);
        return redirect()->to(base_url('sub'));
    }

    public function update($idsub)
    {
        # code...
        // $data = 
        $this->sub->save([
            'idsub' => $idsub,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'idkriteria' => $this->request->getPost('idkriteria')
        ]);
        // dd($data);
        return redirect()->to(base_url('sub'));
    }

    public function hapus($idsub)
    {
        # code...
        $this->sub->delete($idsub);
        return redirect()->to(base_url('sub'));
    }
}
