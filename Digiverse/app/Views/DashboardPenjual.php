<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Penjual - DIGIVERSE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      color: #000;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #f8f9fa;
      border-bottom: 1px solid #ddd;
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      color: #000;
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
      color: #555 !important;
      margin-left: 1rem;
    }

    .navbar-nav .nav-link:hover {
      color: #000 !important;
    }

    .nft-card {
      background-color: #f0f0f0;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 25px;
      text-align: center;
      transition: 0.3s ease-in-out;
      border: 1px solid #ddd;
    }

    .nft-card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nft-card img {
      border-radius: 12px;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .nft-title {
      font-size: 1.1rem;
      margin-top: 10px;
      font-weight: bold;
    }

    .nft-price {
      color: #7c4dff;
      font-weight: bold;
    }

    .btn-tambah {
      margin-top: 20px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('penjual/dashboard') ?>">
      <img src="<?= base_url('img/digiverseV2.jpg') ?>" alt="Logo"> DIGIVERSE Artist
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/dashboard') ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/tambah') ?>">Tambah NFT</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/riwayat') ?>">Riwayat Penjualan</a></li>
         <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/profile') ?>">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <h1 class="my-4">Dashboard Penjual</h1>
  <a href="<?= site_url('penjual/tambah') ?>" class="btn btn-outline-dark btn-tambah">+ Tambah NFT Baru</a>

  <div class="row mt-4">
    <?php foreach ($nfts as $nft): ?>
      <div class="col-md-3 col-sm-6">
        <div class="nft-card">
          <img src="<?= base_url('uploads/nft/' . $nft['gambar']) ?>" alt="<?= esc($nft['judul']) ?>">
          <div class="nft-title"><?= esc($nft['judul']) ?></div>
          <div class="nft-price">Rp <?= number_format($nft['harga'], 0, ',', '.') ?></div>
          <div class="text-muted mt-2">Status: <?= esc($nft['status']) ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
