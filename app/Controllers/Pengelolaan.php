<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengelolaan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pengelolaan | Laundry',
        ];
        return view('pengelolaan', $data);
    }
}
