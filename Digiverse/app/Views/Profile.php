<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Profil - DigiVerse</title>
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

    .profile-section {
      max-width: 600px;
      background: #1a1a1a;
      padding: 30px;
      margin: 50px auto;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
      text-align: center;
    }

    .profile-section img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }

    .profile-section h2 {
      margin-bottom: 10px;
    }

    .profile-section p {
      color: #aaa;
      margin-bottom: 5px;
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
          <li class="nav-item"><a class="nav-link" href="<?= site_url('profil') ?>">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('riwayat') ?>">Riwayat</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <?php if (session()->getFlashdata('warning')) : ?>
    <div class="alert alert-warning">
      <?= session()->getFlashdata('warning') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <div class="profile-section">
    <img src="<?= base_url('img/logo.png') ?>" alt="Profile">

    <h2><?= esc($user['nama_lengkap']) ?></h2>
    <p>Email: <?= esc($user['email']) ?></p>
    <p>No HP: <?= esc($user['no_hp']) ?></p>
    <p>Alamat: <?= esc($user['alamat']) ?></p>

    <!-- Tombol Edit yang membuka modal -->
    <div class="text-center mt-4">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profil</button>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="<?= site_url('profile/update') ?>" method="POST" class="modal-content bg-dark text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" id="nama" value="<?= esc($user['nama_lengkap']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= esc($user['email']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label">No HP</label>
              <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= esc($user['no_hp']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" required><?= esc($user['alamat']) ?></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>