<?php

namespace App\Controllers;

use App\Models\UserModels;

class ProfileController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user.id_user');
        $model = new UserModels();
        $data['user'] = $model->where('id_user', $userId)->first();

        if (!$data['user']) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('Profile', $data);
    }

    public function update()
    {
        $userId = session()->get('user.id_user');
        $model = new UserModels();

        $user = $model->find($userId);

        if (!$user) {
            return redirect()->to('/profile')->with('error', 'User tidak ditemukan.');
        }

        // Ambil data dari form, jika kosong gunakan data lama
        $data = [
            'nama_lengkap' => $this->request->getPost('nama') ?: $user['nama_lengkap'],
            'email'        => $this->request->getPost('email') ?: $user['email'],
            'no_hp'        => $this->request->getPost('no_hp') ?: $user['no_hp'],
            'alamat'       => $this->request->getPost('alamat') ?: $user['alamat'],
        ];

        if ($model->update($userId, $data)) {
            return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            log_message('error', 'Gagal update profil untuk user ID: ' . $userId);
            log_message('error', implode(' | ', $model->errors()));

            return redirect()->to('/profile')->with('error', 'Gagal memperbarui profil. Silakan coba lagi.');
        }
    }
}
