<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | DigiVerse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --dark-gray: #1a1a1a;
            --medium-gray: #333333;
            --light-gray: #4d4d4d;
            --lighter-gray: rgb(33, 32, 32);
            --lightest-gray: #f8f9fa;
            --white: #ffffff;
        }

        body {
            background-color: var(--lightest-gray);
            color: var(--dark-gray);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .registration-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 15px;
        }

        .registration-card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
        }

        .registration-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--lighter-gray);
        }

        .registration-header h2 {
            color: var(--dark-gray);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .registration-header p {
            color: var(--light-gray);
        }

        .form-label {
            font-weight: 500;
            color: var(--medium-gray);
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--lighter-gray);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--medium-gray);
            box-shadow: 0 0 0 0.25rem rgba(51, 51, 51, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
        }

        .btn-register {
            background-color: var(--dark-gray);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin-top: 1rem;
        }

        .btn-register:hover {
            background-color: var(--medium-gray);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .form-section-title {
            color: var(--medium-gray);
            font-weight: 600;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--lighter-gray);
            font-size: 1.1rem;
        }

        .required-field::after {
            content: " *";
            color: #dc3545;
        }

        .login-link {
            color: var(--medium-gray);
            text-decoration: underline;
        }

        .login-link:hover {
            color: var(--dark-gray);
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <div class="registration-card">
            <div class="registration-header">
                <h2>Form Registrasi DigiVerse</h2>
                <p>Lengkapi semua data berikut untuk membuat akun baru</p>
            </div>
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

            <form action="<?= base_url('login/register') ?>" method="POST" enctype="multipart/form-data">
                <!-- Bagian Informasi Akun -->
                <div class="form-section">
                    <h5 class="form-section-title">Informasi Akun</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label required-field">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label required-field">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Bagian Data Pribadi -->
                <div class="form-section">
                    <h5 class="form-section-title">Data Pribadi</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label required-field">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label required-field">Jenis Kelamin</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Foto Profil</label>
                            <input type="file" name="foto_profile" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-field">Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control"></textarea>
                    </div>
                </div>

                <!-- Bagian Informasi Tambahan -->
                <div class="form-section">
                    <h5 class="form-section-title">Informasi Tambahan</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nomor Rekening</label>
                            <input type="text" name="no_rekening" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required-field">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="Pembeli">Pembeli</option>
                                <option value="Penjual">Penjual</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label required-field">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-register">Daftar Sekarang</button>

                <!-- Link Login -->
                <div class="text-center mt-4">
                    <p>Sudah punya akun? <a href="<?= base_url('login') ?>" class="login-link">Masuk disini</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi client-side sederhana
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan Konfirmasi Password tidak sama!');
            }
        });
    </script>
</body>

</html>