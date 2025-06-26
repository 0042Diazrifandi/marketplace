<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NftModel;
use App\Models\TransaksiModel;

class PenjualController extends BaseController
{
    public function dashboard()
    {
        $user = session()->get('user');
        $model = new NftModel();
        $data['nfts'] = $model->where('id_penjual', $user['id_user'])->findAll();
        return view('dashboardPenjual', $data);
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function simpan()
    {
        $user = session()->get('user');
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/nft', $namaGambar);
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar.');
        }

        $model = new NftModel();
        $model->insert([
            'judul'      => $this->request->getPost('nama_nft'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
            'gambar'     => $namaGambar,
            'status'     => 'Pending',
            'id_penjual' => $user['id_user']
        ]);

        return redirect()->to('/penjual/dashboard')->with('success', 'NFT berhasil ditambahkan.');
    }

    public function riwayat()
    {
        $user = session()->get('user');
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.*, nft.judul as nama_nft, nft.gambar, users.nama_lengkap as nama_pembeli');
        $builder->join('nft', 'nft.id_nft = transaksi.id_nft');
        $builder->join('users', 'users.id_user = transaksi.id_pembeli');
        $builder->where('nft.id_penjual', $user['id_user']);
        $builder->orderBy('transaksi.tanggal_pembelian', 'DESC');
        $query = $builder->get();
        $data['penjualan'] = $query->getResultArray();

        return view('riwayat_penjualan', $data);
    }
}
