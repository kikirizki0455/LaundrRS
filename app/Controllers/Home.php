<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
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
        $queryBahan =  $builderBahan->get();
        $bahan = $queryBahan->getResult();
        $data = [
            'title' => 'Home | Laundry',
            'pegawai' => $pegawai,
            'barang' => $barang,
            'bahan' => $bahan

        ];
        return view('home', $data);
    }


    public function tambah_pegawai()
    {
        $data = [
            'title' => 'Tambah Pegawai | Laundry',

        ];
        return view('tambah_pegawai', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $nomorPegawai = $data['nomor_pegawai'];

        // Cek apakah nomor pegawai sudah ada
        $existing = $this->db->table('pegawai')->where('nomor_pegawai', $nomorPegawai)->countAllResults();

        if ($existing > 0) {
            // Jika nomor pegawai sudah ada, tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Nomor pegawai sudah ada.');
        }

        // Jika nomor pegawai belum ada, simpan data
        $this->db->table('pegawai')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }
    public function edit_pegawai($id)
    {
        $builder = $this->db->table('pegawai');
        $builder->where('id_pegawai', $id);
        $data['pegawai'] = $builder->get()->getRow();
        $data['title'] = 'Edit Pegawai | Laundry';

        return view('edit_pegawai', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_pegawai');
        $data = [
            'nomor_pegawai' => $this->request->getPost('nomor_pegawai'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'role_pegawai' => $this->request->getPost('role_pegawai')
        ];

        $this->db->table('pegawai')->update($data, ['id_pegawai' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil diperbarui');
        }
    }

    public function delete_pegawai($id)
    {
        $this->db->table('pegawai')->delete(['id_pegawai' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(site_url('home'))->with('error', 'Gagal menghapus data.');
        }
    }


    // barang

    public function update_barang()
    {
        $id = $this->request->getPost('nama_barang');
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
        ];

        $this->db->table('barang')->update($data, ['id' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil diperbarui');
        }
    }

    public function delete_barang($id)
    {
        $this->db->table('barang')->delete(['id' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(site_url('home'))->with('error', 'Gagal menghapus data.');
        }
    }

    public function tambah_barang()
    {
        $data = [
            'title' => 'Tambah Barang | Laundry',
        ];
        return view('tambah_barang', $data);
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
            return redirect()->to(site_url('home'))->with('success_barang', 'Data barang berhasil disimpan.');
        } else {
            return redirect()->back()->with('error_barang', 'Gagal menyimpan data barang.');
        }
    }

    public function edit_barang($id)
    {
        $builder = $this->db->table('barang');
        $builder->where('id', $id);
        $data['barang'] = $builder->get()->getRow();
        $data['title'] = 'Edit Pegawai | Laundry';

        return view('edit_barang', $data);
    }

    //bahan

    public function tambah_bahan()
    {
        $data = [
            'title' => 'Tambah Bahan | Laundry',
        ];
        return view('tambah_bahan', $data);
    }
    public function update_bahan()
    {
        $id = $this->request->getPost('nama_bahan');
        $data = [
            'nama_bahan' => $this->request->getPost('nama_bahan'),
            'stok_bahan' => $this->request->getPost('stok_bahan'),
        ];

        $this->db->table('barang')->update($data, ['id' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil diperbarui');
        }
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
            return redirect()->to(site_url('home'))->with('success_barang', 'Data bahan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error_bahan', 'Gagal menyimpan data bahan.');
        }
    }

    public function edit_bahan($id)
    {
        $builder = $this->db->table('barang');
        $builder->where('id', $id);
        $data['barang'] = $builder->get()->getRow();
        $data['title'] = 'Edit Pegawai | Laundry';

        return view('edit_barang', $data);
    }
}
