<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
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
          <a href="#">
            <i class="las la-chart-bar"></i>
            <span class="menu-text">Analysis</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="las la-comments"></i>
            <span class="menu-text">Counseling</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="las la-file-alt"></i>
            <span class="menu-text">Content</span>
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

      <!-- Profile Section -->
      <div class="profile">
        <div class="profile-header">
          <!-- Profile Image -->
          <div class="image-container">
            <img src="<?php echo base_url('assets/img/rt.jpg'); ?>" alt="Profile Image" class="profile-img" id="profileImg" />
            <button class="edit-btn" onclick="window.location.href= 'views/admin/edit-profile.php'">
              <i class="fas fa-pencil-alt"></i>
            </button>
          </div>

          <!-- User Information -->
          <div class="profile-info">
            <h4 id="userName">[Name]</h4>
            <p id="userRole">[Role]</p>
          </div>
        </div>

        <!-- Personal Information -->
        <div class="personal-info">
          <h3>Personal Information</h3>
          <ul>
            <li>Email: <span id="userEmail">[Email]</span></li>
          </ul>
        </div>
      </div>
    </main>
  </div>
  <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>