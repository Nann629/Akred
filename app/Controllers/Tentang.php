<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tentang extends BaseController
{
    public function index()
    {
        $data = [
            'Title' => 'Tentang'
        ];
        return view('tentang/index');
    }
}
