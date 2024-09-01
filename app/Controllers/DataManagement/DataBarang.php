<?php

namespace App\Controllers\DataManagement;

use App\Controllers\BaseController;

class DataBarang extends BaseController
{
    public function index()
    {
        $builderBarang = $this->db->table('barang');
        $queryBarang = $builderBarang->get();
        $barang = $queryBarang->getResult();

        $data = [
            'title' => 'Data Barang | Laundry',
            'barang' => $barang,
        ];

        return view('data_barang', $data);
    }

    public function tambah_barang()
    {
        $data = [
            'title' => 'Tambah Barang | Laundry',
        ];
        return view('tambah_barang', $data);
    }

    public function update_barang()
    {
        $id_barang = $this->request->getPost('id_barang');
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
        ];

        $this->db->table('barang')->update($data, ['id_barang' => $id_barang]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_barang'))->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function store_barang()
    {
        $data = $this->request->getPost();


        // Menggunakan tabel yang benar
        $this->db->table('barang')->insert([
            'nama_barang' => $data['nama_barang'],
            'stok' => $data['stok'],
        ]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_barang'))->with('success_barang', 'Data barang berhasil disimpan.');
        } else {
            return redirect()->back()->with('error_barang', 'Gagal menyimpan data barang.');
        }
    }
    public function delete_barang($id_barang)
    {
        $this->db->table('barang')->delete(['id_barang' => $id_barang]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('data_barang'))->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(site_url('data_barang'))->with('error', 'Gagal menghapus data.');
        }
    }
    public function edit_barang($id_barang)
    {
        $builder = $this->db->table('barang');
        $builder->where('id_barang', $id_barang);
        $data['barang'] = $builder->get()->getRow();
        $data['title'] = 'Edit Pegawai | Laundry';

        return view('edit_barang', $data);
    }
}
