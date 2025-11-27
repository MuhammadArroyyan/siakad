<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiMutuMigration extends Migration
{
    public function up()
{
    // [cite: 17] Tabel nilai_mutu: nilai_huruf, nilai_mutu
    $this->forge->addField([
        'id' => [ // Kita tambah ID internal agar lebih rapi
            'type' => 'INT', 
            'auto_increment' => true
        ], 
        'nilai_huruf' => [
            'type' => 'VARCHAR',
            'constraint' => 2,
        ],
        'nilai_mutu' => [
            'type' => 'FLOAT', // Bisa 4.0, 3.5 dst
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('nilai_mutu');
}

public function down() { $this->forge->dropTable('nilai_mutu'); }
}
