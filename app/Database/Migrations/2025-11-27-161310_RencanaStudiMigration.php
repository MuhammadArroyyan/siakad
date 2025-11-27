<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RencanaStudiMigration extends Migration
{
    public function up()
{
    // [cite: 16] Tabel rencana_studi (KRS/KHS)
    $this->forge->addField([
        'id_rencana_studi' => [
            'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true,
        ],
        'nim' => [
            'type' => 'VARCHAR', 'constraint' => 20,
        ],
        'id_jadwal' => [
            'type' => 'INT', 'unsigned' => true,
        ],
        'nilai_angka' => [
            'type' => 'FLOAT', 'default' => 0,
        ],
        'nilai_huruf' => [
            'type' => 'VARCHAR', 'constraint' => 2, 'null' => true,
        ],
    ]);

    $this->forge->addKey('id_rencana_studi', true);

    // FOREIGN KEYS
    // Menghubungkan KRS ke Mahasiswa
    $this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
    // Menghubungkan KRS ke Jadwal
    $this->forge->addForeignKey('id_jadwal', 'jadwal', 'id', 'CASCADE', 'CASCADE');

    $this->forge->createTable('rencana_studi');
}

public function down() { $this->forge->dropTable('rencana_studi'); }
}
