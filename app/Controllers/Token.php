<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Token extends BaseController
{
    public function index()
    {
        $data = [
            'Title' => 'Token'
        ];
        return view('token/index');
    }
}
