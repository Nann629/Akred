<?php

namespace App\Controllers;

use App\Models\M_kriteria;

class Kriteria extends BaseController
{
    public function __construct()
    {
        $this->model = new M_kriteria;
    }
    public function index()
    {
        $data = [
            'judul' => 'Data kriteria',
            'kriteria' => $this->model->getAllData()
        ];
        echo view('kriteria/index', $data);
    }
    public function tambah()
    {
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        //insert data
        $success = $this->model->tambah($data);
        if ($success) {
            session()->setFlashdata('message', 'Ditambahkan');
            return redirect()->to(base_url('kriteria'));
        }
    }
    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('kriteria'));
        }
    }
    public function ubah($id)
    {
        $id = $this->request->getPost('idkriteria');
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        //Update data
        $success = $this->model->ubah($data, $id);
        if ($success) {
            session()->setFlashdata('message', 'DiUbah');
            return redirect()->to(base_url('kriteria'));
        }
    }
}
