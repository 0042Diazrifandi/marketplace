<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table            = 'users';            // Nama tabel
    protected $primaryKey       = 'id_user';         // Primary key
    protected $returnType       = 'array';

    protected $allowedFields    = [
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

    // Aktifkan timestamps otomatis untuk created_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Kosongkan karena tidak ada updated_at

    // Validasi otomatis
    protected $validationRules = [
        'username'      => 'required|is_unique[users.username,id_user,{id_user}]',
        'email'         => 'required|valid_email',
        'password'      => 'required|min_length[6]',
        'nama_lengkap'  => 'required',
    ];

    protected $validationMessages = [
        'username' => [
            'required'   => 'Username wajib diisi',
            'is_unique'  => 'Username sudah digunakan'
        ],
        'email' => [
            'required'     => 'Email wajib diisi',
            'valid_email'  => 'Format email tidak valid',
        ],
        'password' => [
            'required'     => 'Password wajib diisi',
            'min_length'   => 'Password minimal 6 karakter'
        ],
        'nama_lengkap' => [
            'required'     => 'Nama lengkap wajib diisi'
        ]
    ];
}
