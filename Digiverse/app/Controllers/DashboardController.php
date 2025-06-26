<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $DashboardModel = new DashboardModel();
        $data['nfts'] = $DashboardModel->where('status !=', 'Terjual')->findAll();
        // dd($data);
        return view('DashboardPembeli', $data);
    }
}
