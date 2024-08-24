<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {

        $builder = $this->db->table('pegawai');
        $query = $builder->get();


        $data = [

            'title' => 'Home | Laundry',
            'pegawai' => $query->getResult()
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
    public function edit($id)
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
    public function delete($id)
    {
        $this->db->table('pegawai')->delete(['id_pegawai' => $id]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('home'))->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to(site_url('home'))->with('error', 'Gagal menghapus data.');
        }
    }
}
