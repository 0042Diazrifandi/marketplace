<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Pembayaran NFT - <?= esc($nft['judul']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-pembayaran {
      background-color: #1e1e1e;
      border: 1px solid #333;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
    }
    .form-label {
      color: #ccc;
    }
    .btn-primary {
      background-color: #6e44ff;
      border: none;
      padding: 10px 25px;
      font-weight: bold;
      border-radius: 8px;
      transition: all 0.3s;
    }
    .btn-primary:hover {
      background-color: #5a36d6;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(110, 68, 255, 0.4);
    }
    .judul-nft {
      color: #6e44ff;
    }
    hr {
      border-top: 1px solid #333;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card-pembayaran mx-auto" style="max-width: 600px;">
      <h2 class="mb-4">Pembayaran NFT</h2>
      <hr>
      <p><strong>Judul:</strong> <span class="judul-nft"><?= esc($nft['judul']) ?></span></p>
      <p><strong>Harga:</strong> Rp <?= number_format($nft['harga'], 0, ',', '.') ?></p>
      <p><strong>Penjual:</strong> <?= esc($nft['nama_lengkap']) ?></p>
      <p><strong>No. Rekening Penjual (BRI ONLY):</strong> <?= esc($nft['no_rekening']) ?></p>
      <hr>
      <form action="<?= site_url('nft/prosesPembayaran/' . $nft['id_nft']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3 mt-4">
          <label for="bukti" class="form-label">Upload Bukti Pembayaran (QRIS)</label>
          <input type="file" name="bukti" class="form-control bg-dark text-white" required />
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Pembayaran</button>
      </form>
    </div>
  </div>
</body>
</html>
