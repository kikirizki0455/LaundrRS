<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimbanganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_timbangan' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'berat_barang' => [
                'type' => 'FLOAT',
                'null' => false,
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'in_progress', 'completed'],
                'default' => 'pending',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_timbangan', true);
        $this->forge->createTable('timbangan');
    }

    public function down()
    {
        $this->forge->dropTable('timbangan');
    }
}
