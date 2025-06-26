<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['id_transaksi', 'bukti_transfer', 'tanggal_pembayaran'];
    protected $useTimestamps = false;  // nonaktifkan timestamps
}
