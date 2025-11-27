<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['nim', 'nama']; // Field yang boleh diisi manual
    protected $useTimestamps = true; // Agar created_at terisi otomatis
}