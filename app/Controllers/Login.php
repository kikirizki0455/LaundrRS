<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login | Laundry',
        ];
        return view('login', $data);
    }
}
