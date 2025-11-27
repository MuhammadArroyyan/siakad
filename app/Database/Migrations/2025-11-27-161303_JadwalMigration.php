<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JadwalMigration extends Migration
{
    public function up()
{
    // [cite: 15] Tabel jadwal
    $this->forge->addField([
        'id' => [
            'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true,
        ],
        'nama_kelas' => [
            'type' => 'VARCHAR', 'constraint' => 50, // Misal: 4A, 2B
        ],
        'id_mata_kuliah' => [
            'type' => 'INT', 'unsigned' => true,
        ],
        'id_ruangan' => [
            'type' => 'INT', 'unsigned' => true,
        ],
        'nidn' => [
            'type' => 'VARCHAR', 'constraint' => 20,
        ],
        'hari' => [
            'type' => 'VARCHAR', 'constraint' => 20,
        ],
        'jam' => [
            'type' => 'VARCHAR', 'constraint' => 20,
        ],
    ]);

    $this->forge->addKey('id', true);
    
    // DEFINISI FOREIGN KEYS (RELASI) 
    // Jika MK dihapus, jadwal ikut terhapus (CASCADE)
    $this->forge->addForeignKey('id_mata_kuliah', 'mata_kuliah', 'id_mata_kuliah', 'CASCADE', 'CASCADE');
    // Jika Ruangan dihapus, jadwal set NULL atau hapus
    $this->forge->addForeignKey('id_ruangan', 'ruangan', 'id_ruangan', 'CASCADE', 'CASCADE');
    // Jika Dosen dihapus, jadwal ikut terhapus
    $this->forge->addForeignKey('nidn', 'dosen', 'nidn', 'CASCADE', 'CASCADE');

    $this->forge->createTable('jadwal');
}

public function down() { $this->forge->dropTable('jadwal'); }
}
