<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kriteria extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllData()
    {
        return $this->db->table('kriteria')->get();
    }
    public function tambah($data)
    {
        return $this->db->table('kriteria')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('kriteria')->delete(['idkriteria' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->db->table('kriteria')->update($data, ['idkriteria' => $id]);
    }
}
