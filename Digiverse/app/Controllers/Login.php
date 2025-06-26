<?php

namespace App\Controllers;

use App\Models\UserModels;

class Login extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->has('user')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login | DigiVerse'
        ];

        return view('form_login', $data);
    }

    public function proses()
    {
        // Validasi input
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Username dan password harus diisi');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModels();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Set session
                $sessionData = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'role' => $user['role'],
                    'foto_profile' => $user['foto_profile'],
                    'isLoggedIn' => true
                ];

                session()->set('user', $sessionData);
                // dd($sessionData);
                // Redirect sesuai role
                switch ($user['role']) {
                    case 'Penjual':
                        return redirect()->to('/penjual/dashboard');
                    case 'Pembeli':
                        return redirect()->to('/dashboard');
                    case 'Admin':
                        return redirect()->to('/admin/dashboard');
                    default:
                        return redirect()->to('/dashboard');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'User tidak ditemukan');
        }
    }

    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->has('user')) {
            return redirect()->to('/dashboard');
        }

        return view('register');
    }


    public function simpanRegister()
    {
        // Ambil file foto_profile
        $fileFoto = $this->request->getFile('foto_profile');

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Generate nama random untuk file supaya tidak bentrok
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan file ke folder public/uploads
            $fileFoto->move('uploads', $namaFoto);
        } else {
            // Jika tidak ada upload, pakai default
            $namaFoto = 'default.png';
        }

        // Ambil data dari form
        $data = [
            'username'      => $this->request->getPost('username'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'bio'           => $this->request->getPost('bio'),
            'no_rekening'   => $this->request->getPost('no_rekening'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'          => $this->request->getPost('role'),
            'foto_profile'  => $namaFoto
        ];

        // Simpan ke database
        $userModel = new \App\Models\UserModels();

        if (!$userModel->save($data)) {
            // Jika validasi gagal, hapus foto yang terlanjur di-upload
            if ($namaFoto != 'default.png' && file_exists('uploads/' . $namaFoto)) {
                unlink('uploads/' . $namaFoto);
            }
            return redirect()->back()->withInput()->with('error', $userModel->errors());
        }

        // Jika sukses
        return redirect()->to('/login')->with('success', 'Akun berhasil dibuat. Silakan login!');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
