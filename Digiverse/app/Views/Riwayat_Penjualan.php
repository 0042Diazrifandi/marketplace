<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Penjualan - DIGIVERSE</title>
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

    .badge-terjual {
      background-color: #28a745;
      color: #fff;
      font-size: 0.8rem;
      padding: 5px 10px;
      border-radius: 20px;
      display: inline-block;
      margin-top: 5px;
    }

    .text-muted {
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('penjual/dashboard') ?>">
      <img src="<?= base_url('img/digiverseV2.jpg') ?>" alt="Logo"> DIGIVERSE Artist
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/dashboard') ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/tambah') ?>">Tambah NFT</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?= site_url('penjual/riwayat') ?>">Riwayat Penjualan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/Profile') ?>">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container text-center">
  <h1 class="my-4">Riwayat Penjualan</h1>

  <?php if (!empty($penjualan)): ?>
    <div class="row mt-4">
      <?php foreach ($penjualan as $item): ?>
        <div class="col-md-3 col-sm-6">
          <div class="nft-card">
            <img src="<?= base_url('uploads/nft/' . $item['gambar']) ?>" alt="<?= esc($item['nama_nft']) ?>">
            <div class="nft-title"><?= esc($item['nama_nft']) ?></div>
            <div class="nft-price"><?= number_format($item['harga'], 0, ',', '.') ?> ETH</div>
            <div class="text-muted">Pembeli: <?= esc($item['nama_pembeli']) ?></div>
            <div class="text-muted">Tanggal: <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?></div>
            <div class="badge-terjual">Terjual</div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-secondary text-center my-5">Belum ada NFT yang terjual.</div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
