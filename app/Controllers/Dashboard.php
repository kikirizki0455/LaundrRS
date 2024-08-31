<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $builderPegawai = $this->db->table('pegawai');
        $queryPegawai = $builderPegawai->get();
        $pegawai = $queryPegawai->getResult();

        $builderBarang = $this->db->table('barang');
        $queryBarang = $builderBarang->get();
        $barang = $queryBarang->getResult();

        $builderBahan = $this->db->table('bahan');
        $queryBahan = $builderBahan->get();
        $bahan = $queryBahan->getResult();

        $data = [
            'title' => 'Dashboard | Laundry',
            'pegawai' => $pegawai,
            'barang' => $barang,
            'bahan' => $bahan,
        ];

        return view('dashboard', $data);
    }
}
