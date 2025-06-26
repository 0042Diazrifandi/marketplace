<?php

namespace App\Controllers;

use App\Models\DashboardPenjualModel;

class DashboardPenjualController extends BaseController
{
    public function index()
    {
        
        $model = new DashboardPenjualModel();
        $data['nfts'] = $model->where('id_penjual', session()->get('id_penjual'))->findAll();
        return view('DashboardPenjual', $data);
        dd($data);   
        
    }
    
}
