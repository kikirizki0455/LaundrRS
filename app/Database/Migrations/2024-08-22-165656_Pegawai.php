<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateNomorPegawaiColumn extends Migration
{
    public function up()
    {
        // Mengubah tipe data kolom 'nomor_pegawai' menjadi VARCHAR(20)
        $this->forge->modifyColumn('pegawai', [
            'nomor_pegawai' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ]
        ]);
    }

    public function down()
    {
        // Mengembalikan tipe data kolom 'nomor_pegawai' ke INT jika diperlukan
        $this->forge->modifyColumn('pegawai', [
            'nomor_pegawai' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => false
            ]
        ]);
    }
}
