<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 🧾 Route untuk Dashboard Pembeli
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->get('logout', 'Login::logout');
$routes->get('login/register', 'Login::register');
$routes->post('login/register', 'Login::simpanRegister');

$routes->get('dashboard', 'DashboardController::index');
$routes->get('nft/detail/(:num)', 'NftController::detail/$1');
$routes->get('nft/(:num)', 'NftController::detail/$1');
$routes->get('nft/pembayaran/(:num)', 'NftController::pembayaran/$1');
$routes->post('nft/prosesPembayaran/(:num)', 'NftController::prosesPembayaran/$1');

$routes->get('profile', 'ProfileController::index');
$routes->post('profile/update', 'ProfileController::update');
$routes->get('riwayat', 'RiwayatController::index');

// 🧾 Route untuk Admin
$routes->get('admin/dashboard', 'DashboardAdminController::index');
$routes->get('admin/verifikasi', 'AdminVerifikasiController::index');
$routes->get('admin/verifikasi/setuju/(:num)', 'AdminVerifikasiController::setuju/$1');
$routes->get('admin/verifikasi/tolak/(:num)', 'AdminVerifikasiController::tolak/$1');
$routes->get('admin/AdminKelolaPengguna', 'AdminKelolaPengguna::index');
$routes->get('admin/AdminKelolaPengguna/detail/(:num)', 'AdminKelolaPengguna::detail/$1');

// 🧾 Route untuk Penjual
$routes->get('penjual/dashboard', 'PenjualController::dashboard');
$routes->get('penjual/tambah', 'PenjualController::tambah');
$routes->post('penjual/simpan', 'PenjualController::simpan');
$routes->get('penjual/riwayat', 'PenjualController::riwayat');

$routes->get('penjual/profile', 'ProfilePenjualController::index');
$routes->get('penjual/profile/edit', 'ProfilePenjualController::edit');  // (Kalau nanti kamu pakai halaman edit khusus)
$routes->post('penjual/profile/update', 'ProfilePenjualController::update');
