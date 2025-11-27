<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kelas', 'id_mata_kuliah', 'id_ruangan', 'nidn', 'hari', 'jam'];

    // Fitur "Killer": Mengambil data lengkap dengan JOIN
    public function getJadwalLengkap()
    {
        return $this->select('jadwal.*, 
                              mata_kuliah.kode_mata_kuliah, 
                              mata_kuliah.nama_mata_kuliah, 
                              mata_kuliah.sks,
                              dosen.nama as nama_dosen, 
                              ruangan.nama_ruangan')
                    ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
                    ->join('dosen', 'dosen.nidn = jadwal.nidn')
                    ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan')
                    ->orderBy('hari', 'DESC')
                    ->findAll();
    }
}