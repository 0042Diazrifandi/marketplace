<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardPenjualModel extends Model
{
    protected $table = 'nft';
    protected $primaryKey = 'id_nft';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_nft', 'deskripsi', 'gambar', 'harga', 'status', 'id_penjual'];
}
