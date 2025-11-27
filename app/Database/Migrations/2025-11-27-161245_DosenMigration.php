<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DosenMigration extends Migration
{
    public function up()
{
    // [cite: 12] Tabel dosen: nidn (PK) dan nama
    $this->forge->addField([
        'nidn' => [
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
    $this->forge->addKey('nidn', true); // Primary Key
    $this->forge->createTable('dosen');
}

public function down() { $this->forge->dropTable('dosen'); }
}
