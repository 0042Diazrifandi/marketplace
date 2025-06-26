<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Riwayat Pembelian - DigiVerse</title>
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
    .table-dark {
      background-color: #1a1a1a;
    }
    th, td {
      vertical-align: middle !important;
    }
    .container {
      margin-top: 50px;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
        <img src="<?= base_url('img/digiverseV2.jpg'); ?>" alt="Logo">
        DIGIVERSE
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= site_url('dashboard') ?>">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('profile') ?>">Profil</a></li>
          <li class="nav-item"><a class="nav-link active" href="<?= site_url('riwayat') ?>">Riwayat</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="text-center mb-5">Riwayat Pembelian Anda</h2>

    <?php if (!empty($pembelian)) : ?>
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama NFT</th>
          <th>Harga</th>
          <th>Tanggal Beli</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($pembelian as $item) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= esc($item['nama_nft']) ?></td>
          <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
          <td><?= date('d-m-Y', strtotime($item['tanggal_pembelian'])) ?></td>
          <td>
            <?php if ($item['status'] == 'Berhasil') : ?>
              <span class="badge bg-success">Selesai</span>
            <?php elseif ($item['status'] == 'Pending') : ?>
              <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
            <?php else : ?>
              <span class="badge bg-secondary"><?= esc($item['status']) ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else : ?>
      <div class="alert alert-secondary text-center">Belum ada transaksi pembelian.</div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
