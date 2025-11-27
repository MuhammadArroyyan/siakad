<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
{
    // [cite: 18] Tabel user: id_user, nama_user, role, kode_peran
    $this->forge->addField([
        'id_user' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'nama_user' => [ // Username untuk login
            'type' => 'VARCHAR',
            'constraint' => 100,
            'unique' => true, 
        ],
        'password' => [ // Wajib ada untuk login, meski PDF tidak sebut
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'role' => [
            'type' => 'ENUM',
            'constraint' => ['admin', 'dosen', 'mahasiswa'],
            'default' => 'mahasiswa',
        ],
        'kode_peran' => [ // Link ke NIM atau NIDN (Polymorphic)
            'type' => 'VARCHAR',
            'constraint' => 20,
            'null' => true,
        ],
    ]);
    $this->forge->addKey('id_user', true);
    $this->forge->createTable('user');
}

public function down() { $this->forge->dropTable('user'); }
}
