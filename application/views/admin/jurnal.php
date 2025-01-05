<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jurnal</title>
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

      <div class="user-list">
        <h2 class="table-title">Daftar Jurnal</h2>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Baca</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Judul</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>25/10/24</td>
              <td>Sahlah R</td>
              <td>sahlahr08@gmail.com</td>
              <td>Ada Apa Dengan Cinta?</td>
              <td class="status active">Completed</td>
            </tr>
            <tr>
              <td>2</td>
              <td>08/06/24</td>
              <td>jaehyun06</td>
              <td>jaehyun06@gmail.com</td>
              <td>Jatuh Cinta</td>
              <td class="status non-active">Pending</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>
