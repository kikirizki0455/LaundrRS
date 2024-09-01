<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Ambil data bahan
        $builderBahan = $db->table('bahan');
        $queryBahan = $builderBahan->get();
        $bahan = $queryBahan->getResult();

        // Ambil data barang
        $builderBarang = $db->table('barang');
        $queryBarang = $builderBarang->get();
        $barang = $queryBarang->getResult();

        // Ambil data pegawai
        $builderPegawai = $db->table('pegawai');
        $queryPegawai = $builderPegawai->get();
        $pegawai = $queryPegawai->getResult();

        // Kelompokkan bahan kritis
        $bahan_kritis = array_filter($bahan, function ($b) {
            return $b->stok_bahan < 5;
        });

        // Mengelompokkan bahan kritis berdasarkan ID bahan
        $bahan_kritis_unique = [];
        foreach ($bahan_kritis as $b) {
            if (!isset($bahan_kritis_unique[$b->id_bahan])) {
                $bahan_kritis_unique[$b->id_bahan] = $b;
            }
        }

        $data = [
            'title' => 'Dashboard | Laundry',
            'bahan' => $bahan,
            'barang' => $barang,
            'pegawai' => $pegawai,
            'bahan_kritis' => $bahan_kritis_unique, // Kirimkan bahan kritis unik
            'modalBahan' => session()->get('modalBahan'), // Ambil data modal dari session
            'modalBahanId' => session()->get('modalBahanId') // Ambil id bahan dari session
        ];

        // Hapus data modal dari session setelah digunakan
        session()->remove('modalBahan');
        session()->remove('modalBahanId');

        return view('dashboard', $data);
    }

    public function tambah_stok()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bahan'); // Nama tabel bahan

        $idBahan = $this->request->getPost('id_bahan');
        $stokTambah = $this->request->getPost('stok_tambah');

        if ($idBahan && $stokTambah) {
            // Cek apakah bahan ada di database
            $builder->where('id_bahan', $idBahan);
            $bahan = $builder->get()->getRow();

            if ($bahan) {
                $newStok = $bahan->stok_bahan + $stokTambah;

                // Update stok bahan
                $builder->where('id_bahan', $idBahan);
                $builder->update(['stok_bahan' => $newStok]);

                return redirect()->to('/dashboard')->with('message', 'Stok berhasil diperbarui');
            } else {
                return redirect()->to('/dashboard')->with('error', 'Bahan tidak ditemukan');
            }
        }

        return redirect()->to('/dashboard')->with('error', 'Gagal memperbarui stok');
    }

    public function show_modal($bahanId)
    {
        // Ambil data bahan dari database
        $db = \Config\Database::connect();
        $builder = $db->table('bahan');
        $builder->where('id_bahan', $bahanId);
        $bahan = $builder->get()->getRow();

        if ($bahan) {
            // Simpan data modal di session
            session()->set([
                'modalBahan' => $bahan->nama_bahan,
                'modalBahanId' => $bahan->id_bahan
            ]);
        }

        return redirect()->to('/dashboard');
    }
}
