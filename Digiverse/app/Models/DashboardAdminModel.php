<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardAdminModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';

    protected $allowedFields = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'no_hp',
        'gender',
        'alamat',
        'foto_profile',
        'bio',
        'no_rekening',
        'role',
        'status',
        'created_at'
    ];

    // Fungsi untuk mendapatkan daftar pengguna (pembeli & penjual)
    public function getAllUsers()
    {
        return $this->whereIn('role', ['Pembeli', 'Penjual'])->findAll();
    }

    // Fungsi untuk mendapatkan jumlah total pengguna aktif
    public function countActiveUsers()
    {
        return $this->where('status', 'Aktif')->countAllResults();
    }

    // Fungsi untuk mendapatkan semua NFT untuk verifikasi
    public function getAllNFTsPending()
    {
        return $this->db->table('nft')
                        ->select('nft.*, users.nama_lengkap as nama_penjual')
                        ->join('users', 'users.id_user = nft.id_penjual')
                        ->where('nft.status', 'Pending')
                        ->get()
                        ->getResultArray();
    }

    // Fungsi untuk mendapatkan semua transaksi
    public function getAllTransactions()
    {
        return $this->db->table('transaksi')
                        ->select('transaksi.*, users.nama_lengkap, nft.judul')
                        ->join('users', 'users.id_user = transaksi.id_pembeli')
                        ->join('nft', 'nft.id_nft = transaksi.id_nft')
                        ->get()
                        ->getResultArray();
    }
}
