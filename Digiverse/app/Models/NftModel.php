<?php

namespace App\Models;

use CodeIgniter\Model;

class NftModel extends Model
{
    protected $table = 'nft';
    protected $primaryKey = 'id_nft';
    protected $allowedFields = [
        'id_penjual',
        'judul',
        'deskripsi',
        'harga',
        'gambar',
        'status',
        'created_at',
    ];
    
    protected $useTimestamps = false;
    
    // protected $validationRules = [
    //     'id_penjual' => 'required|min_length[3]|max_length[255]',
    //     'judul' => 'required|min_length[3]|max_length[255]',
    //     'deskripsi' => 'required|min_length[10]',
    //     'harga' => 'required|numeric',
    //     'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
    // ];
    
    // protected $validationMessages = [
    //     'judul' => [
    //         'required' => 'Nama NFT harus diisi',
    //         'min_length' => 'Nama NFT minimal 3 karakter',
    //         'max_length' => 'Nama NFT maksimal 255 karakter'
    //     ],
    //     'gambar' => [
    //         'uploaded' => 'Anda harus mengunggah gambar',
    //         'max_size' => 'Ukuran gambar maksimal 2MB',
    //         'is_image' => 'File harus berupa gambar (jpg, jpeg, png)'
    //     ]
    // ];
    
    // public function getAllNfts($perPage = 12)
    // {
    //     return $this->paginate($perPage);
    // }
    
    // public function getNftById($id)
    // {
    //     return $this->find($id);
    // }
    
    // public function searchNfts($keyword)
    // {
    //     return $this->like('judul', $keyword)
    //                ->orLike('deskripsi', $keyword)
    //                ->findAll();
    // }
    
    // public function getLatestNfts($limit = 4)
    // {
    //     return $this->orderBy('created_at', 'DESC')
    //                ->limit($limit)
    //                ->findAll();
    // }
}
