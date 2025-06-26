<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_pembeli', 'id_nft', 'harga',
        'metode_pembayaran', 'status', 'tanggal_pembelian'
    ];
    protected $useTimestamps = false;  // nonaktifkan timestamps

    // ✅ Fungsi tambahan untuk riwayat penjualan penjual
    public function getRiwayatPenjualan($idPenjual)
    {
        return $this->select('transaksi.*, nft.judul, nft.gambar, nft.id_penjual')
                    ->join('nft', 'transaksi.id_nft = nft.id_nft')
                    ->where('nft.id_penjual', $idPenjual)
                    ->findAll();
    }
}
