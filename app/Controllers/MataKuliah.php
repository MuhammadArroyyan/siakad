<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;

class MataKuliah extends BaseController
{
    protected $mkModel;

    public function __construct()
    {
        $this->mkModel = new MataKuliahModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Mata Kuliah',
            'mk' => $this->mkModel->findAll()
        ];
        return view('matakuliah/index', $data);
    }

    public function store()
    {
        // Validasi Sederhana
        if (!$this->validate([
            'kode_mata_kuliah' => 'required|is_unique[mata_kuliah.kode_mata_kuliah]',
            'nama_mata_kuliah' => 'required'
        ])) {
            return redirect()->to('/matakuliah')->with('errors', $this->validator->getErrors());
        }

        $this->mkModel->save([
            'kode_mata_kuliah' => $this->request->getVar('kode_mata_kuliah'),
            'nama_mata_kuliah' => $this->request->getVar('nama_mata_kuliah'),
            'sks' => $this->request->getVar('sks'),
        ]);

        session()->setFlashdata('pesan', 'Mata Kuliah berhasil ditambahkan.');
        return redirect()->to('/matakuliah');
    }

    public function delete($id)
    {
        $this->mkModel->delete($id);
        session()->setFlashdata('pesan', 'Mata Kuliah dihapus.');
        return redirect()->to('/matakuliah');
    }
}