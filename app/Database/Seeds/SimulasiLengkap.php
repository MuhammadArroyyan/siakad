<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SimulasiLengkap extends Seeder
{
    public function run()
    {
        // 1. BUAT RUANGAN
        $ruangan = [
            ['nama_ruangan' => 'Lab Komputer 1'],
            ['nama_ruangan' => 'Gedung A - 201'],
            ['nama_ruangan' => 'Gedung B - 105'],
        ];
        $this->db->table('ruangan')->insertBatch($ruangan);
        echo "Ruangan Created...\n";

        // 2. BUAT MATA KULIAH
        $mk = [
            ['kode_mata_kuliah' => 'WEB001', 'nama_mata_kuliah' => 'Pemrograman Web', 'sks' => 4],
            ['kode_mata_kuliah' => 'SYS002', 'nama_mata_kuliah' => 'Sistem Operasi', 'sks' => 3],
            ['kode_mata_kuliah' => 'ALG003', 'nama_mata_kuliah' => 'Algoritma', 'sks' => 3],
            ['kode_mata_kuliah' => 'DAT004', 'nama_mata_kuliah' => 'Basis Data', 'sks' => 4],
        ];
        $this->db->table('mata_kuliah')->insertBatch($mk);
        echo "Mata Kuliah Created...\n";

        // 3. BUAT ADMIN
        $this->db->table('user')->insert([
            'nama_user' => 'admin',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role' => 'admin',
            'kode_peran' => null
        ]);

        // 4. BUAT DOSEN & USER DOSEN
        $dosenList = [
            ['nidn' => '001', 'nama' => 'Dr. Nova, M.Kom'],
            ['nidn' => '002', 'nama' => 'Budi Santoso, S.T., M.T.'],
        ];
        
        foreach($dosenList as $d) {
            // Insert Data Dosen
            $this->db->table('dosen')->insert($d);
            // Insert User Login Dosen
            $this->db->table('user')->insert([
                'nama_user' => 'dosen' . $d['nidn'], // username: dosen001
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role' => 'dosen',
                'kode_peran' => $d['nidn'] // Link ke tabel dosen
            ]);
        }
        echo "Dosen & Users Created...\n";

        // 5. BUAT MAHASISWA & USER MAHASISWA
        $mhsList = [
            ['nim' => '2023001', 'nama' => 'Arroyyan'],
            ['nim' => '2023002', 'nama' => 'Siti Aminah'],
            ['nim' => '2023003', 'nama' => 'John Doe'],
        ];

        foreach($mhsList as $m) {
            // Insert Data Mahasiswa
            $this->db->table('mahasiswa')->insert($m);
            // Insert User Login Mahasiswa
            $this->db->table('user')->insert([
                'nama_user' => $m['nim'], // username: nim
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'role' => 'mahasiswa',
                'kode_peran' => $m['nim'] // Link ke tabel mahasiswa
            ]);
        }
        echo "Mahasiswa & Users Created...\n";

        // 6. BUAT JADWAL (Hubungkan MK, Ruangan, Dosen)
        // Kita ambil ID manual karena kita tahu urutan insertnya
        $jadwal = [
            [
                'nama_kelas' => 'TI-A', 'id_mata_kuliah' => 1, 'id_ruangan' => 1, 
                'nidn' => '001', 'hari' => 'Senin', 'jam' => '08:00 - 10:00'
            ],
            [
                'nama_kelas' => 'TI-B', 'id_mata_kuliah' => 2, 'id_ruangan' => 2, 
                'nidn' => '002', 'hari' => 'Selasa', 'jam' => '10:00 - 12:00'
            ],
             [
                'nama_kelas' => 'TI-C', 'id_mata_kuliah' => 4, 'id_ruangan' => 1, 
                'nidn' => '001', 'hari' => 'Rabu', 'jam' => '13:00 - 15:00'
            ],
        ];
        $this->db->table('jadwal')->insertBatch($jadwal);
        echo "Jadwal Created...\n";

        // 7. BUAT RENCANA STUDI (Simulasi Mahasiswa Ambil KRS)
        // Arroyyan ambil Web Programming & Basis Data
        $krs = [
            ['nim' => '2023001', 'id_jadwal' => 1, 'nilai_angka' => 0, 'nilai_huruf' => null],
            ['nim' => '2023001', 'id_jadwal' => 3, 'nilai_angka' => 0, 'nilai_huruf' => null],
            // Siti ambil Sistem Operasi
            ['nim' => '2023002', 'id_jadwal' => 2, 'nilai_angka' => 85, 'nilai_huruf' => 'A'], // Simulasi sudah dinilai
        ];
        $this->db->table('rencana_studi')->insertBatch($krs);
        echo "KRS Simulasi Created...\n";
    }
}