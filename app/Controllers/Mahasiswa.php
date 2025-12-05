<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\UserModel;

class Mahasiswa extends BaseController
{
    protected $mhsModel;
    protected $userModel;

    public function __construct()
    {
        $this->mhsModel = new MahasiswaModel();
        $this->userModel = new UserModel();
    }

    public function index()
{
    $data = [
        'title' => 'Data Mahasiswa',
        'mahasiswa' => $this->mhsModel->orderBy('created_at', 'DESC')->findAll()
    ];
    return view('mahasiswa/index', $data);
}

    public function create()
    {
        $data = ['title' => 'Tambah Mahasiswa', 'validation' => \Config\Services::validation()];
        return view('mahasiswa/form', $data);
    }

    public function store()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'nim' => 'required|is_unique[mahasiswa.nim]',
            'nama' => 'required'
        ])) {
            return redirect()->to('/mahasiswa/create')->withInput();
        }

        // 2. Mulai Transaksi Database (Atomic Operation)
        $db = \Config\Database::connect();
        $db->transStart();

        // A. Simpan Data Mahasiswa
        $this->mhsModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
        ]);

        // B. OTOMATIS Buat Akun Login
        $this->userModel->save([
            'nama_user' => $this->request->getVar('nim'), // Username = NIM
            'password'  => password_hash($this->request->getVar('nim'), PASSWORD_DEFAULT), // Password = NIM (hashed)
            'role'      => 'mahasiswa',
            'kode_peran'=> $this->request->getVar('nim')
        ]);

        $db->transComplete(); // Selesai Transaksi

        session()->setFlashdata('pesan', 'Mahasiswa & Akun Login berhasil ditambahkan!');
        return redirect()->to('/mahasiswa');
    }

    public function edit($nim)
    {
        $data = [
            'title' => 'Edit Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mhs' => $this->mhsModel->find($nim)
        ];
        return view('mahasiswa/form', $data);
    }

    public function update($id)
    {
        // Validasi simpel untuk update
        $this->mhsModel->save([
            'nim' => $id, // PK untuk update
            'nama' => $this->request->getVar('nama'),
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/mahasiswa');
    }

    public function delete($nim)
    {
        // Hapus di tabel mahasiswa (Cascade di database akan otomatis hapus user jika settingan DB benar)
        // Tapi untuk keamanan, kita hapus manual user-nya juga lewat kode
        
        $db = \Config\Database::connect();
        $db->transStart();

        // Cari ID User berdasarkan kode_peran (NIM)
        $user = $this->userModel->where('kode_peran', $nim)->first();
        if($user) {
            $this->userModel->delete($user['id_user']);
        }
        
        $this->mhsModel->delete($nim);

        $db->transComplete();

        session()->setFlashdata('pesan', 'Data Mahasiswa & Akun berhasil dihapus.');
        return redirect()->to('/mahasiswa');
    }
}