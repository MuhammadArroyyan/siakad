<?php

namespace App\Controllers;

use App\Models\JadwalModel;

class Penilaian extends BaseController
{
    // HALAMAN 1: List Kelas yang Diajar Dosen Tersebut
    public function index()
    {
        $nidn = session()->get('kode_peran');
        $model = new JadwalModel();
        
        // Custom Query: Cari jadwal dimana dosennya adalah user yang login
        // Kita reuse method getJadwalLengkap tapi difilter manual di view/query
        // Agar cepat, kita pakai query builder sederhana saja
        $db = \Config\Database::connect();
        $jadwal_ajar = $db->table('jadwal')
                          ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
                          ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan')
                          ->where('jadwal.nidn', $nidn)
                          ->get()->getResultArray();

        $data = ['title' => 'Jadwal Mengajar', 'jadwal' => $jadwal_ajar];
        return view('dosen/jadwal_ajar', $data);
    }

    // HALAMAN 2: Form Input Nilai (List Mahasiswa di Jadwal tsb)
    public function input($id_jadwal)
    {
        $db = \Config\Database::connect();
        
        // 1. Ambil Info Jadwal
        $jadwal = $db->table('jadwal')
                     ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
                     ->where('jadwal.id', $id_jadwal)
                     ->get()->getRowArray();

        // 2. Ambil Daftar Mahasiswa yang ambil jadwal ini (Join KRS & Mhs)
        $mahasiswa = $db->table('rencana_studi')
                        ->join('mahasiswa', 'mahasiswa.nim = rencana_studi.nim')
                        ->where('rencana_studi.id_jadwal', $id_jadwal)
                        ->get()->getResultArray();

        $data = [
            'title' => 'Input Nilai: ' . $jadwal['nama_mata_kuliah'],
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa
        ];

        return view('dosen/input_nilai', $data);
    }

    // PROSES: Simpan Nilai Massal
    public function simpan()
    {
        $db = \Config\Database::connect();
        $krsModel = new \App\Models\RencanaStudiModel();
        
        // Kita terima array dari form: nilai_angka[id_krs] = 80
        $nilai_data = $this->request->getVar('nilai_angka');
        $id_jadwal = $this->request->getVar('id_jadwal');

        foreach($nilai_data as $id_krs => $angka) {
            // Konversi Angka ke Huruf (Logika Sederhana)
            $huruf = 'E';
            if ($angka >= 85) $huruf = 'A';
            else if ($angka >= 80) $huruf = 'B+';
            else if ($angka >= 75) $huruf = 'B';
            else if ($angka >= 70) $huruf = 'C+';
            else if ($angka >= 60) $huruf = 'C';
            else if ($angka >= 50) $huruf = 'D';

            // Update satu per satu
            $krsModel->update($id_krs, [
                'nilai_angka' => $angka,
                'nilai_huruf' => $huruf
            ]);
        }

        return redirect()->to('/dosen/input/' . $id_jadwal)->with('pesan', 'Nilai berhasil disimpan!');
    }
}