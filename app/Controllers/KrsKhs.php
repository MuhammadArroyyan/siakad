<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\RencanaStudiModel; // Kita perlu buat model ini sebentar lagi

class KrsKhs extends BaseController
{
    protected $jadwalModel;
    protected $krsModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        // Manual load model karena kita belum buat filenya
        $this->krsModel = new \App\Models\RencanaStudiModel();
    }

    // HALAMAN 1: Lihat Jadwal & Ambil KRS
    public function index_krs()
    {
        $nim = session()->get('kode_peran');
        
        // Ambil jadwal yang SUDAH diambil mahasiswa ini (untuk disable tombol)
        $ambil = $this->krsModel->where('nim', $nim)->findColumn('id_jadwal') ?? [];

        $data = [
            'title' => 'Rencana Studi (KRS)',
            'jadwal' => $this->jadwalModel->getJadwalLengkap(),
            'sudah_diambil' => $ambil
        ];
        return view('mahasiswa/krs', $data);
    }

    // PROSES: Simpan Pilihan Jadwal
    public function ambil_jadwal($id_jadwal)
    {
        $nim = session()->get('kode_peran');

        // Cek duplikasi (Jangan sampai ambil MK yang sama 2x)
        $cek = $this->krsModel->where(['nim' => $nim, 'id_jadwal' => $id_jadwal])->first();
        if($cek) {
            return redirect()->to('/krs')->with('error', 'Mata kuliah ini sudah diambil!');
        }

        $this->krsModel->save([
            'nim' => $nim,
            'id_jadwal' => $id_jadwal,
            'nilai_angka' => 0 // Nilai awal 0
        ]);

        return redirect()->to('/krs')->with('pesan', 'Berhasil mengambil mata kuliah.');
    }

    // PROSES: Batal Ambil
    public function batal_jadwal($id_jadwal)
    {
        $nim = session()->get('kode_peran');
        // Hapus berdasarkan NIM dan ID Jadwal (Query Builder)
        $db = \Config\Database::connect();
        $db->table('rencana_studi')->where(['nim' => $nim, 'id_jadwal' => $id_jadwal])->delete();

        return redirect()->to('/krs')->with('pesan', 'Mata kuliah dibatalkan.');
    }

    // HALAMAN 2: Lihat Hasil Studi (KHS & IPK)
    public function index_khs()
    {
        $nim = session()->get('kode_peran');
        
        // MAGIC QUERY: Join 4 Tabel + Tabel Nilai Mutu
        // Tujuannya: Dapat SKS, Nama MK, dan Nilai Mutu (4.0, 3.0) sekaligus
        $db = \Config\Database::connect();
        $builder = $db->table('rencana_studi');
        $builder->select('rencana_studi.*, mata_kuliah.nama_mata_kuliah, mata_kuliah.kode_mata_kuliah, mata_kuliah.sks, nilai_mutu.nilai_mutu as bobot');
        $builder->join('jadwal', 'jadwal.id = rencana_studi.id_jadwal');
        $builder->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah');
        $builder->join('nilai_mutu', 'nilai_mutu.nilai_huruf = rencana_studi.nilai_huruf', 'left'); // Left join jaga-jaga kalau nilai belum keluar
        $builder->where('rencana_studi.nim', $nim);
        
        $khs = $builder->get()->getResultArray();

        // HITUNG IPK (Total (Bobot x SKS) / Total SKS)
        $total_sks = 0;
        $total_poin = 0;
        
        foreach($khs as $k) {
            if($k['nilai_huruf'] != null) { // Hanya hitung yang sudah ada nilai
                $total_sks += $k['sks'];
                $total_poin += ($k['sks'] * $k['bobot']);
            }
        }

        $ipk = ($total_sks > 0) ? number_format($total_poin / $total_sks, 2) : 0;

        $data = [
            'title' => 'Kartu Hasil Studi',
            'khs' => $khs,
            'ipk' => $ipk,
            'total_sks' => $total_sks
        ];

        return view('mahasiswa/khs', $data);
    }
}