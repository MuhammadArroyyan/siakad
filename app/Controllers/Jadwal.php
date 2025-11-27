<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\MataKuliahModel;
use App\Models\DosenModel;
use App\Models\RuanganModel;

class Jadwal extends BaseController
{
    protected $jadwalModel, $mkModel, $dosenModel, $ruanganModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->mkModel = new MataKuliahModel();
        $this->dosenModel = new DosenModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'jadwal' => $this->jadwalModel->getJadwalLengkap() // Pakai fungsi JOIN tadi
        ];
        return view('jadwal/index', $data);
    }

    public function create()
    {
        // Kirim semua data master ke view untuk dropdown
        $data = [
            'title' => 'Buat Jadwal Baru',
            'mk'    => $this->mkModel->findAll(),
            'dosen' => $this->dosenModel->findAll(),
            'ruangan' => $this->ruanganModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('jadwal/form', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kelas' => 'required',
            'id_mata_kuliah' => 'required',
            'nidn' => 'required',
            'id_ruangan' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ])) {
            return redirect()->to('/jadwal/create')->withInput();
        }

        $this->jadwalModel->save([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'id_mata_kuliah' => $this->request->getVar('id_mata_kuliah'),
            'nidn' => $this->request->getVar('nidn'), // NIDN Dosen
            'id_ruangan' => $this->request->getVar('id_ruangan'),
            'hari' => $this->request->getVar('hari'),
            'jam' => $this->request->getVar('jam'),
        ]);

        session()->setFlashdata('pesan', 'Jadwal berhasil diterbitkan.');
        return redirect()->to('/jadwal');
    }

    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        session()->setFlashdata('pesan', 'Jadwal dihapus.');
        return redirect()->to('/jadwal');
    }
}