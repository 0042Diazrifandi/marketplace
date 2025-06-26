<?php

namespace App\Controllers;

use App\Models\UserModels;
use App\Models\NftModel;
use App\Models\TransaksiModel;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModels();
        $nftModel = new NftModel();
        $transaksiModel = new TransaksiModel();

        $data = [
            'totalUsers' => $userModel->countAll(),
            'totalNFT' => $nftModel->countAll(),
            'totalTransaksi' => $transaksiModel->countAll(),
            'totalVerified' => $nftModel->where('status', 'verified')->countAllResults()
        ];

        return view('DashboardAdmin', $data);
    }
}
