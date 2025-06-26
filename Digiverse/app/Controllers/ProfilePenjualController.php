<?php

namespace App\Controllers;

use App\Models\UserModels;

class ProfilePenjualController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user.id_user');
        $model = new UserModels();
        $data['user'] = $model->where('id_user', $userId)->first();

        if (!$data['user']) {
            return redirect()->to(site_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('ProfilePenjual', $data);
    }

    public function update()
    {
        $userId = session()->get('user.id_user');
        $model = new UserModels();

        $user = $model->find($userId);

        if (!$user) {
            return redirect()->to(site_url('penjual/profile'))->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama'),
            'email'        => $this->request->getPost('email'),
            'no_hp'        => $this->request->getPost('no_hp'),
            'alamat'       => $this->request->getPost('alamat'),
        ];

        if ($model->update($userId, $data)) {
            return redirect()->to(site_url('penjual/profile'))->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->to(site_url('penjual/profile'))->with('error', 'Gagal memperbarui profil.');
        }
    }
}
