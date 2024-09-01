<?php

namespace App\Controllers\DataManagement;

use App\Controllers\BaseController;

class DataBahan extends BaseController
{
    public function index()
    {
        $builderDataBahan = $this->db->table('bahan');
        $queryDataBahan = $builderDataBahan->get();
        $bahan = $queryDataBahan->getResult();

        $data = [
            'title' => 'Data Bahan | Laundry',
            'bahan' => $bahan,
        ];

        return view('data_bahan', $data);
    }
    public function tambah_bahan()
    {
        $data = [
            'title' => 'Tambah Bahan | Laundry',
        ];
        return view('tambah_bahan', $data);
    }
    public function store_bahan()
    {
        $data = $this->request->getPost();


        // Menggunakan tabel yang benar
        $this->db->table('bahan')->insert([
            'nama_bahan' => $data['nama_bahan'],
            'stok_bahan' => $data['stok_bahan'],
        ]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_bahan'))->with('success_barang', 'Data bahan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error_bahan', 'Gagal menyimpan data bahan.');
        }
    }
    public function update_bahan()
    {
        $id_bahan = $this->request->getPost('id_bahan');
        $data = [
            'nama_bahan' => $this->request->getPost('nama_bahan'),
            'stok_bahan' => $this->request->getPost('stok_bahan'),
        ];

        $this->db->table('bahan')->update($data, ['id_bahan' => $id_bahan]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_bahan'))->with('success', 'Data berhasil diperbarui');
        }
    }

    public function edit_bahan($id_bahan)
    {
        $builder = $this->db->table('bahan');
        $builder->where('id_bahan', $id_bahan);
        $data['bahan'] = $builder->get()->getRow();
        $data['title'] = 'Edit Bahan | Laundry';

        return view('edit_bahan', $data);
    }
    public function delete_bahan($id_bahan)
    {
        $this->db->table('bahan')->delete(['id_bahan' => $id_bahan]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_bahan'))->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(site_url('data_bahan'))->with('error', 'Gagal menghapus data.');
        }
    }
}
