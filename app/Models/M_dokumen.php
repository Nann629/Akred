<?php

namespace App\Models;

use CodeIgniter\Model;

class M_dokumen extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllData()
    {
        return $this->db->table('dokumen')->get();
    }
    public function tambah($data)
    {
        return $this->db->table('dokumen')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('dokumen')->delete(['iddokumen' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->db->table('dokumen')->update($data, ['iddokumen' => $id]);
    }
}
