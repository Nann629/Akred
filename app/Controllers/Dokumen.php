<?php

namespace App\Controllers;

use App\Models\DokumenModel;
use CodeIgniter\Throttle\ThrottlerInterface;

//use App\Models\DokumenModel;

class Dokumen extends BaseController
{
    public function __construct()
    {
        // $this->model = new DokumenModel();
    }
    public function index()
    {
        $modelku = new DokumenModel();
        $data['list'] = $modelku->select('*');
        return view('dokumen/index', $data);
    }

    public function tambah()
    {
        # code...
        $modelku = new DokumenModel();
        $data = [
            'iddokumen' => $this->request->getVar('iddokumen'),
            'file' => $this->request->getVar('file'),
            'tgl_upload' => $this->request->getVar('tgl_upload'),
            'idsub' => $this->request->getVar('idsub'),
            'iduser' => $this->request->getVar('iduser'),
];
        //insert data
        $success = $this->$modelku->getPost($data);
        if($success){
        session()->setFlashdata('message', 'Ditambahkan');
        return redirect()->to(base_url('dokumen'));
    }
}

    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('dokumen'));
        }
    }
    public function ubah()
    {
        $id = $this->request->getPost('iddokumen');
        $data = [
            'dokumen' => $this->request->getPost('dokumen')
        ];
        //Update data
        $success = $this->model->ubah($data, $id);
        if ($success) {
            session()->setFlashdata('message', 'DiUbah');
            return redirect()->to(base_url('dokumen'));
        }
    }
}
