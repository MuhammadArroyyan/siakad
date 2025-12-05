<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;

class Dosen extends BaseController
{
    protected $dosenModel;
    protected $userModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->userModel = new UserModel();
    }

    public function index()
{
    $data = [
        'title' => 'Data Dosen',
        'dosen' => $this->dosenModel->orderBy('created_at', 'DESC')->findAll()
    ];
    return view('dosen/index', $data);
}

    public function create()
    {
        $data = ['title' => 'Tambah Dosen', 'validation' => \Config\Services::validation()];
        return view('dosen/form', $data);
    }

    public function store()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'nidn' => 'required|is_unique[dosen.nidn]',
            'nama' => 'required'
        ])) {
            return redirect()->to('/dosen/create')->withInput();
        }

        // 2. Transaksi Database (Atomic)
        $db = \Config\Database::connect();
        $db->transStart();

        // A. Simpan Data Dosen
        $this->dosenModel->save([
            'nidn' => $this->request->getVar('nidn'),
            'nama' => $this->request->getVar('nama'),
        ]);

        // B. Buat Akun Login Dosen Otomatis
        $this->userModel->save([
            'nama_user' => $this->request->getVar('nidn'), // Username: dosen123
            'password'  => password_hash('123456', PASSWORD_DEFAULT),
            'role'      => 'dosen',
            'kode_peran'=> $this->request->getVar('nidn')
        ]);

        $db->transComplete();

        session()->setFlashdata('pesan', 'Dosen & Akun Login berhasil ditambahkan!');
        return redirect()->to('/dosen');
    }

    public function edit($nidn)
    {
        $data = [
            'title' => 'Edit Dosen',
            'validation' => \Config\Services::validation(),
            'dosen' => $this->dosenModel->find($nidn)
        ];
        return view('dosen/form', $data);
    }

    public function update($id)
    {
        $this->dosenModel->save([
            'nidn' => $id,
            'nama' => $this->request->getVar('nama'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Dosen berhasil diubah.');
        return redirect()->to('/dosen');
    }

    public function delete($nidn)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        // Hapus User Dosen dulu
        // Kita cari user yang kode_peran-nya NIDN ini
        $user = $this->userModel->where('kode_peran', $nidn)->first();
        if($user) {
            $this->userModel->delete($user['id_user']);
        }
        
        // Hapus Data Dosen
        $this->dosenModel->delete($nidn);

        $db->transComplete();

        session()->setFlashdata('pesan', 'Data Dosen & Akun berhasil dihapus.');
        return redirect()->to('/dosen');
    }
}