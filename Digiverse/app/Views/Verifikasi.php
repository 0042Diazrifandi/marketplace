<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Verifikasi NFT - DIGIVERSE</title>
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

    h2 {
      margin-top: 40px;
      margin-bottom: 30px;
      font-weight: bold;
      color: #fff;
    }

    .table {
      color: #fff;
    }

    .table thead {
      background-color: #333;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #222;
    }

    .table-striped tbody tr:nth-of-type(even) {
      background-color: #333;
    }

    .btn-info {
      background-color: #17a2b8;
      border: none;
    }

    .btn-info:hover {
      background-color: #138496;
    }

    .btn-success {
      background-color: #28a745;
      border: none;
    }

    .btn-success:hover {
      background-color: #218838;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .modal-content {
      background-color: #222;
      color: #fff;
    }

    .modal-header, .modal-footer {
      border-color: #444;
    }

    .nft-img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
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

<div class="container">
  <h2>Verifikasi NFT</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead>
        <tr>
          <th>Nama NFT</th>
          <th>Penjual</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($nfts)): ?>
          <?php foreach ($nfts as $nft): ?>
            <tr>
              <td><?= esc($nft['judul']) ?></td>
              <td><?= esc($nft['nama_lengkap']) ?></td>
              <td>Rp <?= number_format($nft['harga'], 0, ',', '.') ?></td>
              <td>
                <button class="btn btn-info btn-sm me-2" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalDetail<?= $nft['id_nft'] ?>">
                  Detail
                </button>
                <a href="<?= site_url('admin/verifikasi/setuju/' . $nft['id_nft']) ?>" class="btn btn-success btn-sm me-2">Setujui</a>
                <a href="<?= site_url('admin/verifikasi/tolak/' . $nft['id_nft']) ?>" class="btn btn-danger btn-sm">Tolak</a>
              </td>
            </tr>

            <!-- Modal Detail -->
            <div class="modal fade" id="modalDetail<?= $nft['id_nft'] ?>" tabindex="-1" aria-labelledby="detailLabel<?= $nft['id_nft'] ?>" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailLabel<?= $nft['id_nft'] ?>">Detail NFT</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?= base_url('uploads/' . $nft['gambar']) ?>" class="nft-img" alt="<?= esc($nft['judul']) ?>">
                      </div>
                      <div class="col-md-6">
                        <h5><?= esc($nft['judul']) ?></h5>
                        <p><strong>Deskripsi:</strong> <?= esc($nft['deskripsi']) ?></p>
                        <p><strong>Penjual:</strong> <?= esc($nft['nama_lengkap']) ?></p>
                        <p><strong>Harga:</strong> Rp <?= number_format($nft['harga'], 0, ',', '.') ?></p>
                        <p><strong>Status:</strong> <?= esc($nft['status']) ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center text-muted">Belum ada NFT untuk diverifikasi.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
