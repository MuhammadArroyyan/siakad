<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RuanganMigration extends Migration
{
    public function up()
{
    // [cite: 14] Tabel ruangan: id_ruangan (PK), nama_ruangan
    $this->forge->addField([
        'id_ruangan' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'nama_ruangan' => [
            'type' => 'VARCHAR',
            'constraint' => 50,
        ],
    ]);
    $this->forge->addKey('id_ruangan', true);
    $this->forge->createTable('ruangan');
}

public function down() { $this->forge->dropTable('ruangan'); }
}
