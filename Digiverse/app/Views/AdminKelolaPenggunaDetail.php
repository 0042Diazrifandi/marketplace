<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pengguna - DigiVerse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      margin-top: 50px;
    }

    .card {
      background-color: rgb(214, 210, 210);
      border: 1px solid #444;
    }

    .card p {
      color: #000;
    }

    .card strong {
      color: #000;
    }

    .btn-light {
      color: #000;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Detail Pengguna</h2>
  <div class="card p-4">
    <p><strong>Nama Lengkap:</strong> <?= esc($user['nama_lengkap']) ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
    <p><strong>No HP:</strong> <?= esc($user['no_hp']) ?></p>
    <p><strong>Alamat:</strong> <?= esc($user['alamat']) ?></p>
    <p><strong>Role:</strong> <?= esc($user['role']) ?></p>
    <p><strong>No Rekening:</strong> <?= esc($user['no_rekening'] ?? '-') ?></p>

    <a href="<?= site_url('admin/AdminKelolaPengguna') ?>" class="btn btn-light mt-3">Kembali</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
