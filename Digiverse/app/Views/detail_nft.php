<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= esc($nft['judul']) ?> - DIGIVERSE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ffffff;
      --dark-color: #1e1e1e;
      --secondary-dark: #2a2a2a;
      --light-color: #ffffff;
      --gray-color: #cccccc;
    }

    body {
      background-color: var(--dark-color);
      color: var(--light-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background-color: var(--secondary-dark);
    }

    .navbar-brand {
      color: var(--light-color);
      font-weight: bold;
      font-size: 1.5rem;
    }

    .nav-link {
      color: var(--gray-color) !important;
    }

    .nav-link:hover {
      color: var(--light-color) !important;
    }

    .detail-container {
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .nft-detail-image {
      border-radius: 15px;
      max-height: 500px;
      width: 100%;
      object-fit: cover;
    }

    .nft-detail-title {
      font-weight: bold;
      font-size: 2rem;
      margin-bottom: 20px;
      color: var(--light-color);
    }

    .nft-detail-price {
      font-size: 1.8rem;
      font-weight: bold;
      margin: 20px 0;
    }

    .nft-detail-seller {
      font-size: 1.2rem;
      color: var(--gray-color);
      margin-bottom: 30px;
    }

    .nft-detail-description {
      margin-bottom: 30px;
      line-height: 1.8;
    }

    .btn-detail-buy {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 12px 30px;
      font-size: 1.2rem;
      font-weight: bold;
      border-radius: 8px;
      transition: all 0.3s;
    }

    .btn-detail-buy:hover {
      background-color: #333;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(110, 68, 255, 0.4);
    }

    .back-button {
      margin-bottom: 30px;
      color: var(--gray-color);
      cursor: pointer;
    }

    .back-button:hover {
      color: var(--light-color);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">DIGIVERSE</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('dashboard') ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container detail-container">
  <div class="row mb-4">
    <div class="col-md-1">
      <div class="back-button" onclick="window.history.back()">← Kembali</div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <img src="<?= base_url('uploads/nft/' . $nft['gambar']) ?>" class="nft-detail-image" alt="<?= esc($nft['judul']) ?>">
    </div>
    <div class="col-md-6">
      <h1 class="nft-detail-title"><?= esc($nft['judul']) ?></h1>
      <p class="nft-detail-price">Rp <?= number_format($nft['harga'], 0, ',', '.') ?></p>
      <p class="nft-detail-seller">Penjual: <?= esc($nft['nama_penjual']) ?></p>
      <div class="nft-detail-description">
        <h4>Deskripsi</h4>
        <p><?= nl2br(esc($nft['deskripsi'])) ?></p>
      </div>

      <a href="<?= site_url('nft/pembayaran/' . $nft['id_nft']) ?>" class="btn btn-detail-buy">Beli Sekarang</a>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
