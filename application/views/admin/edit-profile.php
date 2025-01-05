<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit-Profile</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <button class="sidebar-toggle" id="sidebar-toggle">
        <i class="fas fa-bars"></i>
      </button>
      <ul class="menu">
        <li>
          <a href="#">
            <i class="fas fa-heart"></i>
            <span class="menu-text">Mental Health <center>Tracker</center></span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="las la-tachometer-alt"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/daftaruser'); ?>" id="daftaruser">
            <i class="las la-clipboard-list"></i>
            <span class="menu-text">Daftar User</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/daftarpsikolog'); ?>" id="daftarpsikolog">
            <i class="las la-user-md"></i>
            <span class="menu-text">Daftar Psikolog</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/jurnal'); ?>" id="jurnal">
            <i class="las la-file-alt"></i>
            <span class="menu-text">Daftar Jurnal</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <main class="content">
      <!-- Header -->
      <header class="header">
        <div class="logo-container">
          <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo" />
          <span class="site-name">Mindfulmatters</span>
        </div>
        <div class="actions-container">
          <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search..." />
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </header>

      <div class="edit-profile-container">
        <h2>Profile</h2>
        <form action="save-profile.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <img src="<?php echo base_url('assets/img/rt.jpg'); ?>" alt="Profile Image" id="profilePreview" />
            <label for="profileImg">Gambar:</label>
            <input type="file" id="profileImg" name="profileImg" onchange="previewImage(event)" />
          </div>
          <div class="form-group">
            <label for="userEmail">Email:</label>
            <input type="email" id="userEmail" name="userEmail" value="sahlahr08@gmail.com" placeholder="Masukan Email" />
          </div>
          <div class="form-group">
            <label for="userName">Nama Lengkap:</label>
            <input type="text" id="userName" name="userName" value="Sahlah Rizqiyyah" placeholder="Masukan Nama Lengkap" />
          </div>
          <button type="submit">Ubah</button>
          <button type="button" onclick="window.history.back()">Kembali</button>
        </form>
      </div>
    </main>
  </div>
  <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>