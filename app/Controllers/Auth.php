<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // Cari user berdasarkan username
        $data = $model->where('nama_user', $username)->first();
        
        if ($data) {
            $pass = $data['password'];
            // Verifikasi Hash Password
            if (password_verify($password, $pass)) {
                $sessData = [
                    'id_user'    => $data['id_user'],
                    'username'   => $data['nama_user'],
                    'role'       => $data['role'],
                    'kode_peran' => $data['kode_peran'], // NIM atau NIDN tersimpan di sini!
                    'isLoggedIn' => TRUE
                ];
                $session->set($sessData);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}