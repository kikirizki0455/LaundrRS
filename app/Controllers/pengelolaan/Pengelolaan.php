<?php

namespace App\Controllers\Pengelolaan;

use App\Controllers\BaseController;

class Pengelolaan extends BaseController
{
    public function index()
    {


        $data = [
            'title' => 'Pengelolaan | Laundry'
        ];
        return view('pengelolaan', $data);
    }

    public function timbangan()
    {
        $buildertimbangan = $this->db->table('timbangan');
        $queryBahan = $buildertimbangan->get();
        $timbangan = $queryBahan->getResult();
        $data = [
            'title' => 'Timbangan | Laundry',
            'timbangan' => $timbangan

        ];
        return view('timbangan', $data); // Menampilkan form timbangan
    }

    public function create()
    {
        return view('create_timbangan');
    }
}
