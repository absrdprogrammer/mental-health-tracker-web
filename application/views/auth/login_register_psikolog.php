<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ludiflex | Login & Register</title>
  <!-- BOXICONS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- STYLE -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/auth_psikolog.css'); ?>" />
</head>

<body>
  <!-- Form Container -->
  <div class="form-container">
    <div class="col col-1">
      <div class="image-layer">
        <img src="<?php echo base_url('assets/img/love.png'); ?>" class="form-image-main" />
        <img src="<?php echo base_url('assets/img/pls.png'); ?>" class="form-image dots" />
        <img src="<?php echo base_url('assets/img/cld.png'); ?>" class="form-image coin" />
        <img src="" class="form-image spring" />
        <img src="<?php echo base_url('assets/img/stars.png'); ?>" class="form-image stars" />
        <img src="<?php echo base_url('assets/img/brn.png'); ?>" class="form-image rocket" />
        <img src="" class="form-image cloud" />
      </div>
      <p class="featured-words">A Helping Hand, a Listening Ear, and a Guiding Light – We're Here to Support You. <span>MindfulMatters</span></p>
    </div>

    <div class="col col-2">
      <div class="btn-box">
        <button class="btn btn-1" id="login">Sign In</button>
        <button class="btn btn-2" id="register">Sign Up</button>
      </div>

      <!-- Login Form Container-->
      <div class="login-form">
        <div class="form-title">
          <span>Sign In</span>
        </div>
        <div class="form-inputs">
          <form action="<?php echo base_url('auth_psikolog/login'); ?>" method="POST" enctype="multipart/form-data">
            <div class="input-box">
              <input name="email" type="text" class="input-field" placeholder="Email" required />
              <i class="bx bx-user icon"></i>
            </div>
            <div class="input-box">
              <input name="password" type="password" class="input-field" placeholder="Password" required />
              <i class="bx bx-lock-alt icon"></i>
            </div>
            <div class="forgot-pass">
              <a href="#">Forgot Password</a>
            </div>
            <div class="input-box">
              <button class="input-submit">
                <span>Sign In</span>
                <i class="bx bx-right-arrow-alt"></i>
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Pesan Kesalahan Register -->
      <?php echo validation_errors('<div class="error-message">', '</div>'); ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="error-message">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <!-- Register Form Container -->
      <div class="register-form">
        <div class="form-title">
          <span>Sign Up</span>
        </div>
        <div class="form-inputs">
          <form action="<?php echo base_url('auth_psikolog/register'); ?>" method="POST" enctype="multipart/form-data">
            <div class="input-box">
              <input type="text" name="full_name" class="input-field" placeholder="Nama Lengkap" required />
              <i class="bx bx-user icon"></i>
            </div>
            <div class="input-box">
              <input type="text" name="email" class="input-field" placeholder="Email" required />
              <i class="bx bx-envelope icon"></i>
            </div>
            <div class="input-box">
              <input type="date" name="birth_date" class="input-field" placeholder="Tanggal Lahir" required />
              <i class="bx bx-calendar icon" onclick="document.querySelector('.input-field[type=date]').focus();"></i>
            </div>
            <div class="input-box">
              <input type="text" name="gender" class="input-field" placeholder="Jenis Kelamin" required />
              <i class="bx bx-user icon"></i>
            </div>
            <div class="input-box">
              <input type="text" name="clinic_location" class="input-field" placeholder="Alamat Klinik" required />
              <i class="bx bx-map icon"></i>
            </div>
            <div class="input-box">
              <input type="password" name="password" class="input-field" placeholder="Password" required />
              <i class="bx bx-lock-alt icon"></i>
            </div>
            <div class="input-box">
              <label for="photo-upload" class="file-label">Upload Foto (JPG/PNG)</label>
              <input name="photo" type="file" id="photo-upload" class="input-field" accept="image/jpeg, image/png" required />
              <i class="bx bx-image icon"></i>
            </div>
            <div class="input-box">
              <label for="certificate-upload" class="file-label">Upload Sertifikat Profesi (PDF)</label>
              <input name="certificate" type="file" id="certificate-upload" class="input-field" accept="application/pdf" required />
              <i class="bx bx-file icon"></i>
            </div>
            <div class="input-box">
              <button class="input-submit" type="submit">
                <span>Sign Up</span>
                <i class="bx bx-right-arrow-alt"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- JS -->
  <script src="<?php echo base_url('assets/js/auth.js'); ?>"></script>
</body>

</html>