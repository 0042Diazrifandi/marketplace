<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIGIVERSE - NFT Marketplace</title>
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
      text-decoration: none;
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

    .search-bar {
      border-radius: 20px;
      border: none;
      padding: 6px 20px;
      width: 250px;
    }

    .hero-title {
      text-align: center;
      font-size: 3.5rem;
      font-weight: bold;
      margin: 30px 0;
      font-family: 'Georgia', serif;
      letter-spacing: 2px;
    }

    .nft-card {
      background-color: #1a1a1a;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 25px;
      text-align: center;
      transition: 0.3s ease-in-out;
    }

    .nft-card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 10px rgba(17, 11, 11, 0.1);
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

    .nft-seller {
      font-size: 0.9rem;
      color: #aaa;
    }

    .hero {
      background-image: url("/img/backgroundV2.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .hero h1 {
      justify-content: center;
      padding: 150px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
      <img src="<?= base_url('img/digiverseV2.jpg'); ?>" alt="DigiVerse Logo">
      DIGIVERSE
    </a>

    <!-- Search Form -->
    <form class="d-flex ms-auto me-3" method="get" action="<?= site_url('dashboard') ?>">
      <input class="form-control search-bar" type="search" name="q" placeholder="Search" value="<?= esc($_GET['q'] ?? '') ?>">
    </form>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('dashboard') ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('profile') ?>">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('riwayat') ?>">Riwayat</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero">
<div class="container">
<h1 class="hero-title">Welcome To DigiVerse</h1>

</div>
</section>


<div class="container">
  <div class="row">
    <?php foreach ($nfts as $nft): ?>
      <div class="col-md-3 col-sm-6">
        <div class="nft-card">
          <a href="<?= site_url('nft/detail/' . $nft['id_nft']) ?>">
            <img src="<?= base_url('uploads/nft/' . $nft['gambar']) ?>" alt="<?= esc($nft['judul']) ?>">
          </a>
          <div class="nft-title"><?= esc($nft['judul']) ?></div>
          <div class="nft-price">Rp <?= number_format($nft['harga'], 0, ',', '.') ?></div>
          <div class="nft-seller"><?= esc($nft['nama_penjual'] ?? 'Penjual') ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
