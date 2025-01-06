<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
  <div class="dashboard-list">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="menu-top">
        <button class="home-btn" onclick="window.location.href='<?= base_url('admin') ?>'">
          <i class="fas fa-home"></i>
        </button>
        <button class="list-btn" onclick="window.location.href='<?= base_url('admin/users') ?>'">
          <i class="fas fa-clipboard-list"></i>
        </button>
        <button class="list-btn" onclick="window.location.href='<?= base_url('admin/psychologists') ?>'">
          <i class="fa-solid fa-user-doctor"></i>
        </button>
      </div>
      <div class="menu-bottom">
        <button class="logout-btn" onclick="window.location.href='<?= base_url('auth/logout') ?>'">
          <i class="fas fa-sign-out-alt"></i>
        </button>
      </div>
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
          <div class="user-profile">
            <img src="<?php echo base_url('assets/img/rt.jpg'); ?>" alt="User Avatar" class="profile-icon" id="profileIcon">
            <div id="dropdownMenu" class="dropdown-menu">
              <a href="<?php echo base_url('admin/profile'); ?>" id="profile">
                <i class="fas fa-user"></i> Profile
              </a>
              <a href="#">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
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
              <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                  <tr>
                    <td><?php echo date('Y-m-d', strtotime($user->created_at)); ?></td>
                    <td><?= htmlspecialchars($user->full_name); ?></td>
                    <td><?= htmlspecialchars($user->email); ?></td>
                    <td><?= $user->is_active ? 'Active' : 'Inactive'; ?></td>
                    <td><?= $user->journal_count; ?></td>
                    <td><?= $user->post_count; ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3">No users found.</td>
                </tr>
              <?php endif; ?>
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