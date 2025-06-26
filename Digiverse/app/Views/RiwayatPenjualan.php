<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Riwayat Penjualan - DigiVerse</title>
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
      max-width: 1000px;
      background: #1a1a1a;
      padding: 30px;
      margin: 50px auto;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    table thead th {
      color: #fff;
    }

    table tbody td {
      color: #ddd;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="<?= site_url('penjual/dashboard') ?>">
        <img src="<?= base_url('img/digiverseV2.jpg'); ?>" alt="Logo">
        DIGIVERSE
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/dashboard') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/tambah') ?>">Tambah NFT</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/riwayat') ?>">Riwayat</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('penjual/profile') ?>">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="table-container">
    <h2 class="text-center mb-4">Riwayat Penjualan</h2>

    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama NFT</th>
            <th>Tanggal Terjual</th>
            <th>Harga</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($riwayat)): ?>
            <?php $no = 1; foreach ($riwayat as $item): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($item['nama_nft']) ?></td>
                <td><?= esc($item['tanggal_terjual']) ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td>
                  <?php if ($item['status'] == 'terjual'): ?>
                    <span class="badge bg-success">Terjual</span>
                  <?php elseif ($item['status'] == 'pending'): ?>
                    <span class="badge bg-warning text-dark">Pending</span>
                  <?php else: ?>
                    <span class="badge bg-secondary"><?= esc($item['status']) ?></span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">Belum ada data penjualan.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
