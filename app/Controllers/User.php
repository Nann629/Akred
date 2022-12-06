<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->user = new UserModel();
        $this->role = new RoleModel();
    }


    public function index()
    {
        //cek role user
        if (empty($this->role->getrole())) {
            $data = [
                [
                    'role' => 'Admin'
                ],
                [
                    'role' => 'Dosen'
                ],
            ];
            $this->role->insertBatch($data);
        }

        if (empty($this->user->getuser())) {
            $data = [
                'nama' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('Admin123', PASSWORD_DEFAULT),
                'idrole' => 1
            ];
            $this->user->insert($data);
        }

        $data = [
            'judul' => 'User',
            'user' => $this->user->getuser(),
            'role' => $this->role->getrole(),
        ];
        return view('/user/index', $data);
    }

    public function tambah()
    {
        # code...
        // $data = 
        $this->user->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            // 'idrole' => 1,
            'idrole' => $this->request->getVar('idrole'),
        ]);
        // dd($data);
        return redirect()->to(base_url('user'));
    }

    public function update($iduser)
    {
        # code...
        // $data = 
        $this->user->save([
            'iduser' => $iduser,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'idrole' => $this->request->getVar('idrole'),
        ]);
        // dd($data);
        return redirect()->to(base_url('user'));
    }

    public function hapus($iduser)
    {
        # code...
        $this->user->delete($iduser);
        return redirect()->to(base_url('user'));
    }
}
