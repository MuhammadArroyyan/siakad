<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MahasiswaMigration extends Migration
{
    public function up()
{
    // [cite: 11] Tabel mahasiswa: nim (PK) dan nama
    $this->forge->addField([
        'nim' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
        ],
        'nama' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ]);
    $this->forge->addKey('nim', true); // Primary Key
    $this->forge->createTable('mahasiswa');
}

public function down() { $this->forge->dropTable('mahasiswa'); }
}
