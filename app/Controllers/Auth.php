<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\RoleModel;
use App\Models\UserModel;

class Auth extends BaseController
{

    public function __construct()
    {
        // $this->var = $var;
        // $this->user = new UserModel();
        // $this->role = new RoleModel();
    }

    public function index()
    {
        // //
        // if (empty($this->role->getrole())) {
        //     $data = [
        //         [
        //             'role' => 'Admin'
        //         ],
        //         [
        //             'role' => 'Dosen'
        //         ],
        //     ];
        //     $this->role->insertBatch($data);
        // }

        // if (empty($this->user->getuser())) {
        //     $data = [
        //         'nama' => 'Super Admin',
        //         'email' => 'admin@gmail.com',
        //         'password' => password_hash('Admin123', PASSWORD_DEFAULT),
        //         'idrole' => 1
        //     ];
        //     $this->user->insert($data);
        // }
        return view('login');
    }

    public function login()
    {
        $modelusr = new UserModel();
        $sesi = session();

        $user = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $modelusr->where('email', $user)->first();
        if (!is_null($data)) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $data['isLogin'] = true;
                $sesi->set($data);
                if ($data['role'] == '1') {
                    return redirect()->to(base_url('dokumen/index'));
                } else {
                    return redirect()->to(base_url('dokumen/index'));
                }
            } else {
                echo "<script>Maaf , Username dan Password Salah</script>";
                return redirect()->to(base_url('Auth'));
            }
        } else {
            echo "<script>Maaf , Username dan Password Tidak ditemukan</script>";
            return redirect()->to(base_url('Auth'));
        }
    }
}
