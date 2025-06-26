<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - DIGIVERSE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #000;
      border-bottom: 1px solid #444;
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      color: #fff;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .navbar-brand img {
      height: 36px;
      width: 36px;
      margin-right: 10px;
      border-radius: 50%;
    }

    .navbar-nav .nav-link {
      color: #ccc !important;
      margin-left: 1rem;
    }

    .navbar-nav .nav-link:hover {
      color: #fff !important;
    }

    .dashboard-title {
      margin: 30px 0;
    }

    .stat-card {
      background-color: #1a1a1a;
      border-radius: 12px;
      padding: 25px;
      text-align: center;
      color: #fff;
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.05);
      transition: 0.3s ease;
    }

    .stat-card:hover {
      transform: scale(1.02);
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.1);
    }

    .stat-value {
      font-size: 2rem;
      font-weight: bold;
    }

    .stat-label {
      font-size: 1rem;
      color: #bbb;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('admin/dashboard') ?>">
      <img src="<?= base_url('img/digiverseV2.jpg') ?>" alt="Logo"> DIGIVERSE Admin
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/AdminKelolaPengguna') ?>">Kelola Pengguna</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/verifikasi') ?>">Verifikasi NFT</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <h1 class="dashboard-title">Selamat Datang, Admin</h1>

  <div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="stat-card">
        <div class="stat-value"><?= $totalUsers ?></div>
        <div class="stat-label">Total Pengguna</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="stat-card">
        <div class="stat-value"><?= $totalNFT ?></div>
        <div class="stat-label">Total NFT</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="stat-card">
        <div class="stat-value"><?= $totalTransaksi ?></div>
        <div class="stat-label">Total Transaksi</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="stat-card">
        <div class="stat-value"><?= $totalVerified ?></div>
        <div class="stat-label">NFT Terverifikasi</div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
