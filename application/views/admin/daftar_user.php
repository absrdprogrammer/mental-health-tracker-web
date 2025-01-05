<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/line-awesome/css/line-awesome.min.css">
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
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/daftaruser'); ?>" id="daftaruser">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="menu-text">Daftar User</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user-doctor"></i>
                        <span class="menu-text">Daftar Psikolog</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <div class="logo-container">
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo">
                    <span class="site-name">Mindfulmatters</span>
                </div>
                <div class="actions-container">
                    <div class="search-container">
                        <input type="text" class="search-bar" placeholder="Search...">
                        <button class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </header>

      <div class="tables-container">
        <!-- Table Pengguna -->
        <div class="table-box-list">
          <div class="table-header">
            <h3>Data Pengguna</h3>
          </div>
          <table class="data-table-list">
            <thead>
              <tr>
                <th>Tanggal Register</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Jumlah Jurnal</th>
                <th>Jumlah Post</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>25/10/24</td>
                <td>Alwan Nazieh</td>
                <td>Alwan@gmail.com</td>
                <td>Active</td>
                <td>3 Jurnal</td>
                <td>4 Post</td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="chart.js"></script>
      <script src="script.js"></script>
      <script src="kalender.js"></script>
    </body>
    
    </html>
    