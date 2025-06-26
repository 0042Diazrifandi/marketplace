<?php

namespace App\Controllers;

use App\Models\NftModel;

class AdminVerifikasiController extends BaseController
{
    public function index()
    {
        $model = new NftModel();
        $data['nfts'] = $model->join('users', 'users.id_user=nft.id_penjual')->where('nft.status', 'pending')->findAll();
        return view('verifikasi', $data);
    }

    public function setuju($id)
    {
        $model = new NftModel();
        $model->update($id, ['status' => 'verified']);
        return redirect()->back()->with('success', 'NFT telah disetujui.');
    }

    public function tolak($id)
    {
        $model = new NftModel();
        $model->update($id, ['status' => 'rejected']);
        return redirect()->back()->with('success', 'NFT telah ditolak.');
    }
    
}
