<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $role = session()->get('role');

        // Logika untuk mengarahkan ke dashboard yang berbeda sesuai Role
        if ($role == 'admin') {
            return $this->dashboardAdmin();
        } elseif ($role == 'mahasiswa') {
            return view('dashboard/mahasiswa'); // Kita buat nanti
        } elseif ($role == 'dosen') {
            return view('dashboard/dosen'); // Kita buat nanti
        }
    }

    private function dashboardAdmin()
    {
        // Hubungkan ke database untuk menghitung data
        $db = \Config\Database::connect();

        $data = [
            'title' => 'Dashboard Admin',
            'total_mhs'   => $db->table('mahasiswa')->countAll(),
            'total_dosen' => $db->table('dosen')->countAll(),
            'total_mk'    => $db->table('mata_kuliah')->countAll(),
            'total_jadwal'=> $db->table('jadwal')->countAll(),
        ];

        return view('dashboard/admin', $data);
    }
}