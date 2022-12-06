<?php

namespace App\Models;

use CodeIgniter\Model;

class MSub extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sub';
    protected $primaryKey       = 'idsub';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'deskripsi',
        'idkriteria',
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

    public function getsub($idsub = false)
    {
        # code...
        if ($idsub === false) {
            return $this->table('sub')
                ->orderby('idsub', 'DESC')
                ->join('kriteria', 'kriteria.idkriteria = sub.idkriteria')
                ->get()->getResult();
        }
        return $this->table('sub')
            ->orderby('idsub', 'DESC')
            ->join('kriteria', 'kriteria.idkriteria = sub.idkriteria')
            ->getWhere(['idsub' => $idsub])->getRowObject();
    }
}
