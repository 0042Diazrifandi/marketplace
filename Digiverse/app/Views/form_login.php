<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | DigiVerse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: url('https://images.unsplash.com/photo-1639762681057-408e52192e55?q=80&w=2232&auto=format&fit=crop') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    /* Overlay untuk meningkatkan keterbacaan */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 12px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      max-width: 1000px;
      width: 100%;
      position: relative;
      z-index: 1;
    }

    .login-image {
      background: url('https://images.unsplash.com/photo-1612831455546-8f683ac9b013') no-repeat center center;
      background-size: cover;
      min-height: 500px;
      position: relative;
    }

    .login-image::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
    }

    .login-image img {
      position: relative;
      z-index: 1;
    }

    .form-side {
      padding: 2.5rem;
      color: #333;
    }

    .btn-login {
      background-color: rgb(57, 64, 64);
      color: white;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: rgb(40, 45, 45);
      transform: translateY(-2px);
    }

    .Register {
      background-color: rgb(85, 95, 93);
      color: #fff;
      border: none;
      transition: all 0.3s ease;
    }

    .Register:hover {
      background-color: rgb(65, 73, 72);
      transform: translateY(-2px);
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(57, 64, 64, 0.25);
      border-color: rgb(62, 67, 66);
    }

    h2 {
      color: rgb(57, 64, 64);
      font-weight: 600;
    }

    .alert {
      border-left: 4px solid #dc3545;
    }
  </style>
</head>

<body>

  <div class="container p-4">
    <div class="row login-container">
      <!-- Image Side -->
      <div class="col-lg-6 d-none d-lg-flex login-image align-items-center justify-content-center">
        <img src="<?= base_url('img/digiverseV2.jpg'); ?>" alt="DigiVerse Logo" width="500">
      </div>

      <!-- Form Side -->
      <div class="col-lg-6 form-side">
        <h2 class="mb-4 text-center">Welcome To DigiVerse</h2>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

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

        <!-- Form Login -->
        <form action="<?= site_url('login/proses'); ?>" method="POST">
          <?= csrf_field(); ?>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
          </div>

          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-login py-2">Log In</button>
          </div>
        </form>

        <!-- Tombol Register -->
        <div class="d-grid gap-2">
          <a href="<?= site_url('login/register'); ?>" class="btn Register py-2">Register</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>