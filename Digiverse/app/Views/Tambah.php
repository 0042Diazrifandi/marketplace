<form action="<?= site_url('penjual/simpan') ?>" method="POST" enctype="multipart/form-data" class="nft-form-glass">
  <?= csrf_field() ?>
  
  <div class="form-header">
    <div class="form-icon">
      <i class="fas fa-cube"></i>
    </div>
    <h2>Buat NFT Baru</h2>
    <p class="subtitle">Lengkapi detail digital aset Anda</p>
  </div>

  <div class="form-grid">
    <!-- Left Column -->
    <div class="form-col">
      <div class="input-group floating">
        <input type="text" name="nama_nft" id="nama_nft" placeholder=" " required>
        <label for="nama_nft">Nama NFT*</label>
        <i class="fas fa-signature"></i>
      </div>

      <div class="input-group floating">
        <textarea name="deskripsi" id="deskripsi" placeholder=" " required></textarea>
        <label for="deskripsi">Deskripsi*</label>
        <i class="fas fa-align-left"></i>
      </div>
    </div>

    <!-- Right Column -->
    <div class="form-col">
      <div class="input-group floating">
        <input type="number" name="harga" id="harga" step="1000" placeholder=" " required>
        <label for="harga">Harga (Rp)*</label>
        <i class="fas fa-money-bill-wave"></i>
        <span class="currency">Rp</span>
      </div>

    </div>
  </div>

  <!-- Upload Area -->
  <div class="upload-section">
    <div class="upload-card" id="dropZone">
      <div class="upload-content">
        <i class="fas fa-cloud-upload-alt"></i>
        <h3>Upload Gambar NFT</h3>
        <p>Format: JPG, PNG (Max 5MB)</p>
        <button type="button" class="browse-btn">Pilih File</button>
        <input type="file" name="gambar" id="nftFile" accept="image/*" required>
      </div>
    </div>
    <div class="preview-card" id="previewBox">
      <div class="preview-header">
        <span>Preview</span>
        <button type="button" class="remove-btn" id="removeBtn">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="preview-body">
        <img id="previewImage">
      </div>
    </div>
  </div>

  <div class="form-footer">
    <button type="submit" class="submit-btn">
      <i class="fas fa-plus-circle"></i> Publikasikan NFT
      <div class="btn-animation"></div>
    </button>
  </div>
</form>

<style>
:root {
  --primary: #6C5CE7;
  --primary-light: #A29BFE;
  --secondary: #00B894;
  --dark: #2D3436;
  --darker: #1E1E2C;
  --light: #F5F6FA;
  --gray: #636E72;
  --glass: rgba(255, 255, 255, 0.08);
  --glass-border: rgba(255, 255, 255, 0.1);
}

/* Base Styles */
.nft-form-glass {
  max-width: 800px;
  margin: 2rem auto;
  padding: 2.5rem;
  background: var(--darker);
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.2);
  backdrop-filter: blur(10px);
  border: 1px solid var(--glass-border);
  animation: fadeIn 0.6s ease-out;
}

.form-header {
  text-align: center;
  margin-bottom: 2.5rem;
}

.form-icon {
  width: 70px;
  height: 70px;
  margin: 0 auto 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--primary), #8A2BE2);
  border-radius: 50%;
  font-size: 1.8rem;
  color: white;
  box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
}

.form-header h2 {
  color: white;
  font-size: 1.8rem;
  margin-bottom: 0.5rem;
  font-weight: 600;
}

.subtitle {
  color: var(--primary-light);
  font-size: 0.95rem;
  opacity: 0.8;
}

/* Form Grid */
.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

@media (max-width: 768px) {
  .form-grid {
    grid-template-columns: 1fr;
  }
}

/* Floating Input Groups */
.input-group {
  position: relative;
  margin-bottom: 1.8rem;
}

.input-group i {
  position: absolute;
  left: 15px;
  top: 18px;
  color: var(--primary-light);
  font-size: 1.1rem;
  transition: all 0.3s ease;
}

.input-group .currency {
  position: absolute;
  right: 15px;
  top: 18px;
  color: var(--gray);
  font-weight: 500;
}

.input-group input,
.input-group textarea,
.input-group select {
  width: 100%;
  padding: 18px 15px 8px 45px;
  background: var(--glass);
  border: 1px solid var(--glass-border);
  border-radius: 12px;
  color: white;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.input-group textarea {
  min-height: 120px;
  resize: vertical;
  padding-top: 25px;
}

.input-group select {
  appearance: none;
  padding-top: 18px;
  padding-bottom: 8px;
}

.input-group label {
  position: absolute;
  left: 45px;
  top: 18px;
  color: var(--gray);
  pointer-events: none;
  transition: all 0.3s ease;
  font-size: 1rem;
}

/* Floating Label Effect */
.input-group input:focus,
.input-group input:not(:placeholder-shown),
.input-group textarea:focus,
.input-group textarea:not(:placeholder-shown),
.input-group select:focus,
.input-group select:not(:placeholder-shown) {
  padding-top: 25px;
  padding-bottom: 10px;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label,
.input-group textarea:focus + label,
.input-group textarea:not(:placeholder-shown) + label,
.input-group select:focus + label,
.input-group select:not(:placeholder-shown) + label {
  top: 8px;
  left: 45px;
  font-size: 0.8rem;
  color: var(--primary-light);
}

.input-group input:focus ~ i,
.input-group textarea:focus ~ i,
.input-group select:focus ~ i {
  color: var(--primary);
}

/* Upload Section */
.upload-section {
  margin-bottom: 2.5rem;
}

.upload-card {
  border: 2px dashed var(--glass-border);
  border-radius: 15px;
  padding: 2.5rem;
  text-align: center;
  cursor: pointer;
  transition: all 0.3s ease;
  background: var(--glass);
  position: relative;
  overflow: hidden;
}

.upload-card:hover {
  border-color: var(--primary);
  background: rgba(108, 92, 231, 0.05);
}

.upload-content i {
  font-size: 2.5rem;
  color: var(--primary-light);
  margin-bottom: 1rem;
  display: block;
}

.upload-content h3 {
  color: white;
  margin-bottom: 0.5rem;
  font-size: 1.2rem;
}

.upload-content p {
  color: var(--gray);
  font-size: 0.9rem;
  margin-bottom: 1.5rem;
}

.browse-btn {
  background: var(--primary);
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 8px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 0.95rem;
}

.browse-btn:hover {
  background: #5d4acb;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
}

#nftFile {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}

/* Preview Card */
.preview-card {
  display: none;
  margin-top: 1.5rem;
  background: var(--glass);
  border-radius: 15px;
  overflow: hidden;
  border: 1px solid var(--glass-border);
}

.preview-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 15px;
  background: rgba(0,0,0,0.2);
  border-bottom: 1px solid var(--glass-border);
}

.preview-header span {
  color: white;
  font-size: 0.9rem;
  font-weight: 500;
}

.remove-btn {
  background: none;
  border: none;
  color: var(--gray);
  cursor: pointer;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.remove-btn:hover {
  color: #ff7675;
}

.preview-body {
  padding: 15px;
  text-align: center;
}

.preview-body img {
  max-width: 100%;
  max-height: 250px;
  border-radius: 8px;
  display: block;
  margin: 0 auto;
}

/* Submit Button */
.form-footer {
  text-align: center;
}

.submit-btn {
  position: relative;
  width: 100%;
  background: linear-gradient(135deg, var(--primary), #8A2BE2);
  color: white;
  border: none;
  padding: 16px;
  border-radius: 12px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  overflow: hidden;
}

.submit-btn i {
  margin-right: 8px;
}

.submit-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(108, 92, 231, 0.4);
}

.btn-animation {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transition: 0.5s;
}

.submit-btn:hover .btn-animation {
  left: 100%;
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Drag and Drop Highlight */
.highlight {
  border-color: var(--primary) !important;
  background: rgba(108, 92, 231, 0.1) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const dropZone = document.getElementById('dropZone');
  const fileInput = document.getElementById('nftFile');
  const previewBox = document.getElementById('previewBox');
  const previewImage = document.getElementById('previewImage');
  const removeBtn = document.getElementById('removeBtn');
  const browseBtn = dropZone.querySelector('.browse-btn');

  // Click browse button
  browseBtn.addEventListener('click', () => fileInput.click());

  // File input change
  fileInput.addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
      const reader = new FileReader();
      reader.onload = function(event) {
        previewImage.src = event.target.result;
        previewBox.style.display = 'block';
        dropZone.style.display = 'none';
      }
      reader.readAsDataURL(this.files[0]);
    }
  });

  // Remove image
  removeBtn.addEventListener('click', function() {
    previewImage.src = '';
    previewBox.style.display = 'none';
    dropZone.style.display = 'block';
    fileInput.value = '';
  });

  // Drag and drop
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
  });

  function highlight() {
    dropZone.classList.add('highlight');
  }

  function unhighlight() {
    dropZone.classList.remove('highlight');
  }

  dropZone.addEventListener('drop', handleDrop, false);

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
    
    if (files && files[0]) {
      const reader = new FileReader();
      reader.onload = function(event) {
        previewImage.src = event.target.result;
        previewBox.style.display = 'block';
        dropZone.style.display = 'none';
      }
      reader.readAsDataURL(files[0]);
    }
  }
});
</script>