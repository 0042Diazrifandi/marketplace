<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Penjual - DigiVerse</title>
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
    .profile-container {
      max-width: 700px;
      background: #f9f9f9;
      padding: 40px;
      margin: 50px auto;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
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

<div class="container">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center mt-3"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger text-center mt-3"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
</div>

<div class="profile-container">
  <h2 class="mb-4 text-center">Profil Penjual</h2>
  <form action="<?= site_url('penjual/profile/update') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['nama_lengkap']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="no_hp" class="form-label">No HP</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc($user['no_hp']) ?>">
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= esc($user['alamat']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary w-100">Update Profil</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
