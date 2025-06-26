<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class RiwayatController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        $idPembeli = $user['id_user'];

        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.*, nft.judul as nama_nft');
        $builder->join('nft', 'nft.id_nft = transaksi.id_nft');
        $builder->where('transaksi.id_pembeli', $idPembeli);
        $builder->orderBy('transaksi.tanggal_pembelian', 'DESC');
        $query = $builder->get();

        $data['pembelian'] = $query->getResultArray();

        return view('riwayat', $data);
    }
}
