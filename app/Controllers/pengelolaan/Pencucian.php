<?php

namespace App\Controllers\Pengelolaan;

use App\Controllers\BaseController;
use CodeIgniter\Database\Config;

class Pencucian extends BaseController
{
    protected $builderPencucian;
    protected $builderTimbangan;

    public function __construct()
    {
        $db = Config::connect();
        $this->builderPencucian = $db->table('pencucian');
        $this->builderTimbangan = $db->table('timbangan');
    }

    public function index()
    {
        // Mengambil data dari tabel pencucian
        $queryDataPencucian = $this->builderPencucian->get();
        $pencucian = $queryDataPencucian->getResult();

        $data = [
            'title' => 'Pencucian | Laundry',
            'pencucian' => $pencucian
        ];
        return view('pengelola/pencucian', $data);
    }

    public function tambah_pencucian()
    {
        // Mengambil data dari tabel timbangan yang statusnya 'Diterima'
        $this->builderTimbangan->where('status', 'Diterima');
        $queryDataTimbangan = $this->builderTimbangan->get();
        $timbangan = $queryDataTimbangan->getResult();

        $data = [
            'title' => 'Tambah Pencucian | Laundry',
            'timbangan' => $timbangan
        ];

        return view('pengelola/tambah_pencucian', $data);
    }

    public function store()
    {
        $idTimbangan = $this->request->getPost('id_timbangan');

        // Menyimpan data pencucian
        $this->builderPencucian->insert([
            'id_timbangan' => $idTimbangan,
            'waktu_mulai' => date('Y-m-d H:i:s'),
            'status' => 'Dalam Proses'
        ]);

        // Mengupdate status timbangan menjadi 'Dicuci'
        $this->builderTimbangan->where('id_timbangan', $idTimbangan)
            ->update(['status' => 'Dicuci']);

        return redirect()->to('/pengelolaan/pencucian')->with('message', 'Pencucian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil data pencucian berdasarkan ID
        $this->builderPencucian->where('id_pencucian', $id);
        $queryDataPencucian = $this->builderPencucian->get();
        $pencucian = $queryDataPencucian->getRow();

        $data = [
            'title' => 'Update Pencucian | Laundry',
            'pencucian' => $pencucian
        ];

        return view('pengelola/edit_pencucian', $data);
    }

    public function update($id)
    {
        // Mengupdate data pencucian
        $this->builderPencucian->where('id_pencucian', $id)
            ->update([
                'waktu_selesai' => date('Y-m-d H:i:s'),
                'status' => 'Selesai'
            ]);

        // Mengupdate status timbangan menjadi 'Kering'
        $pencucian = $this->builderPencucian->where('id_pencucian', $id)->get()->getRow();
        $this->builderTimbangan->where('id_timbangan', $pencucian->id_timbangan)
            ->update(['status' => 'Kering']);

        return redirect()->to('/pengelolaan/pencucian')->with('message', 'Pencucian berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Menghapus data pencucian
        $this->builderPencucian->where('id_pencucian', $id)->delete();

        return redirect()->to('/pengelolaan/pencucian')->with('message', 'Pencucian berhasil dihapus.');
    }
}
