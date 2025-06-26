<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;

class AdminKelolaPengguna extends BaseController
{
    public function index()
    {
        $model = new UserModels();
        $data['users'] = $model->orderBy('role', 'ASC')->findAll();

        return view('AdminKelolaPengguna', $data);
    }


    public function detail($id_user)
{
    $model = new UserModels();
    $user = $model->find($id_user);

    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan.');
    }

    return view('AdminKelolaPenggunaDetail', ['user' => $user]);
}

}
