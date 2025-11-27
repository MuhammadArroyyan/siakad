<?php

namespace App\Controllers;

use App\Models\RuanganModel;

class Ruangan extends BaseController
{
    protected $ruanganModel;

    public function __construct()
    {
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Ruangan',
            'ruangan' => $this->ruanganModel->findAll()
        ];
        return view('ruangan/index', $data);
    }

    public function store()
    {
        $this->ruanganModel->save([
            'nama_ruangan' => $this->request->getVar('nama_ruangan')
        ]);
        session()->setFlashdata('pesan', 'Ruangan berhasil ditambahkan.');
        return redirect()->to('/ruangan');
    }

    public function delete($id)
    {
        $this->ruanganModel->delete($id);
        session()->setFlashdata('pesan', 'Ruangan berhasil dihapus.');
        return redirect()->to('/ruangan');
    }
}