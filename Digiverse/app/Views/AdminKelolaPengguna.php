<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Pengguna - DigiVerse</title>
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
    .table-container {
      margin-top: 40px;
    }
    .table-dark th, .table-dark td {
      color: #fff;
    }
    .btn-danger {
      color: #fff;
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
        <li class="nav-item"><a class="nav-link active" href="<?= site_url('admin/AdminKelolaPengguna') ?>">Kelola Pengguna</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/verifikasi') ?>">Verifikasi NFT</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container table-container">
  <h2 class="mb-4">Kelola Pengguna</h2>

  <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <table class="table table-striped table-dark table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($users as $user): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($user['nama_lengkap']) ?></td>
        <td><?= esc($user['email']) ?></td>
        <td><?= esc($user['no_hp']) ?></td>
        <td><?= esc($user['alamat']) ?></td>
        <td>
            <?php 
                if ($user['role'] == 'penjual') {
                    echo "<span class='badge bg-primary'>Penjual</span>";
                } elseif ($user['role'] == 'pembeli') {
                    echo "<span class='badge bg-success'>Pembeli</span>";
                } else {
                    echo "<span class='badge bg-secondary'>".$user['role']."</span>";
                }
            ?>
        </td>
        <td>
  <a href="<?= site_url('admin/AdminKelolaPengguna/detail/'.$user['id_user']) ?>" class="btn btn-info btn-sm">Detail</a>
</td>

      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
