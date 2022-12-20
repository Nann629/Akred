<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dokumen';
    protected $primaryKey       = 'iddokumen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'iddokumen',
        'file',
        'tgl_upload',
        'idsub',
        'iduser',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getdokkumen($iddokumen = false)
    {
        # code...
        if ($iddokumen === false) {
            return $this->db->table('dokumen')
                ->join('user', 'user.user_iddokumen = iddokumen.users_id')
                ->get()->getResult();
        }
    }

    public function getdokumen($iddokumen = false)
    {
        # code...
        if ($iddokumen === false) {
            return $this->table('dokumen')
                ->orderby('iddokumen', 'DESC')
                ->join('sub', 'sub.idsub = dokumen.idsub')
                ->join('user', 'user.iduser = dokumen.iduser')
                ->get()->getResult();
        }
        return $this->table('dokumen')
            ->orderby('iddokumen', 'DESC')
            ->join('sub', 'sub.idsub = dokumen.idsub')
            ->join('user', 'user.iduser = dokumen.iduser')
            ->getWhere(['iddokumen' => $iddokumen])->getResultObjek();
    }
}
