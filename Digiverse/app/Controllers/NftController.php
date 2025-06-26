<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NftModel;
use App\Models\TransaksiModel;
use App\Models\PembayaranModel;

class NftController extends BaseController
{
    public function detail($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nft');
        $builder->select('nft.*, users.nama_lengkap AS nama_penjual');
        $builder->join('users', 'users.id_user = nft.id_penjual', 'left');
        $builder->where('nft.id_nft', $id);
        $nft = $builder->get()->getRowArray();

        if (!$nft) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("NFT tidak ditemukan.");
        }

        return view('detail_nft', ['nft' => $nft]);
    }

    public function pembayaran($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nft');
        $builder->select('nft.*, users.nama_lengkap, users.no_rekening');
        $builder->join('users', 'users.id_user = nft.id_penjual', 'left');
        $builder->where('nft.id_nft', $id);
        $nft = $builder->get()->getRowArray();

        if (!$nft) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('NFT tidak ditemukan');
        }

        return view('pembayaran_nft', ['nft' => $nft]);
    }

    public function prosesPembayaran($id)
    {
        $nftModel = new NftModel();
        $transaksiModel = new TransaksiModel();
        $pembayaranModel = new PembayaranModel();

        $nft = $nftModel->find($id);
        if (!$nft) {
            return redirect()->back()->with('error', 'NFT tidak ditemukan.');
        }

        // ✅ Pastikan user login
        $user = session()->get('user');
        if (!$user || !isset($user['id_user'])) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $idPembeli = $user['id_user'];

        // ✅ Simpan transaksi
        $transaksiModel->insert([
            'id_pembeli' => $idPembeli,
            'id_nft' => $id,
            'harga' => $nft['harga'],
            'metode_pembayaran' => 'QRIS',
            'status' => 'Pending',
            'tanggal_pembelian' => date('Y-m-d H:i:s')
        ]);

        $idTransaksi = $transaksiModel->getInsertID();

        // Upload bukti
        $file = $this->request->getFile('bukti');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/bukti', $newName);

            $pembayaranModel->insert([
                'id_transaksi' => $idTransaksi,
                'bukti_transfer' => $newName,
                'tanggal_pembayaran' => date('Y-m-d H:i:s')
            ]);

            // ✅ Update transaksi jadi Berhasil
            $transaksiModel->update($idTransaksi, ['status' => 'Berhasil']);
            $nftModel->update($id, ['status' => 'Terjual']);

            return redirect()->to('/dashboard')->with('success', 'Pembayaran berhasil!');
        } else {
            return redirect()->back()->with('error', 'Upload bukti pembayaran gagal.');
        }
    }
}
