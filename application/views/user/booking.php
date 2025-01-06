<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MindfulMatters</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>" />
</head>

<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar-booking">
      <div class="menu-top">
        <button class="home-btn" onclick="window.location.href='<?= base_url('main') ?>'">
          <i class="fas fa-home"></i>
        </button>
        <button class="calendar-btn">
          <i class="fas fa-calendar"></i>
        </button>
      </div>
      <div class="menu-bottom">
        <button class="logout-btn" onclick="window.location.href='<?= base_url('auth/logout') ?>'">
          <i class="fas fa-sign-out-alt"></i>
        </button>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <!-- Header -->
      <div class="header">
        <div class="header-left">
          <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo" />
          <span class="site-name">MindfulMatters</span>
        </div>

        <div class="header-right">
          <div class="search-container">
            <input type="text" placeholder="Search something..." class="search-bar" />
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="notification-container">
            <button class="notification-btn" id="notification-btn">
              <i class="fas fa-bell"></i>
            </button>
            <div class="notification-dropdown" id="notification-dropdown">
              <p>new notifications</p>
            </div>
          </div>
          <div class="profile-container">
            <button class="icon-btn profile" id="profile-btn">
              <img src="<?php echo base_url('assets/img/gr.png'); ?>" alt="Profile" class="profile-img" />
            </button>
            <div class="profile-dropdown" id="profile-dropdown">
              <div class="profile-header">
                <div class="image-container">
                  <img src="<?php echo base_url('assets/img/gr.png'); ?>" alt="Profile Image" class="profile-img" id="profileImg" />
                  <button class="edit-btn" onclick="window.location.href='<?php echo base_url('main/edit_profile'); ?>'">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </div>
                <div class="profile-info">
                  <h4 id="userName"><?= htmlspecialchars($user['full_name']); ?></h4>
                  <p id="userRole"><?= htmlspecialchars($user['age']); ?> tahun</p>
                </div>
              </div>
              <div class="progress-section">
                <h3>Your Emotional Progress</h3>
                <div class="progress-meta">
                  <small>Track your emotions.</small>
                  <button class="check-in-button" id="checkInBtn">
                    <i class="fas fa-check-circle"></i>
                    Check In Today
                  </button>
                </div>
              </div>

              <div id="moodModal" class="modal">
                <div class="modal-content">
                  <span class="close" id="closeModal">&times;</span>
                  <h3>Halo, <?= htmlspecialchars($user['full_name']); ?>!</h3>

                  <!-- Calendar Section -->
                  <div class="calendar">
                    <div class="calendar-header">
                      <p>Today, <span id="current-date"></span></p>
                    </div>
                    <div class="calendar-dates"></div>
                  </div>

                  <!-- Mood Options -->
                  <div class="mood-options">
                    <button class="mood-btn" data-mood="Happy" onclick="handleMood('happy')">
                      <i class="fas fa-smile" style="color: #ff6384"></i>
                      <span>Happy</span>
                    </button>
                    <button class="mood-btn" data-mood="Neutral" onclick="handleMood('neutral')">
                      <i class="fas fa-meh" style="color: #f6d750"></i>
                      <span>Neutral</span>
                    </button>
                    <button class="mood-btn" data-mood="Sad" onclick="handleMood('sad')">
                      <i class="fas fa-frown" style="color: #ff4500"></i>
                      <span>Sad</span>
                    </button>
                  </div>

                  <div id="mood-selection-message"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Status Booking Header -->
      <div class="status-booking-header">
        <h1>Your Booking</h1>
      </div>

      <!-- Patient Cards -->
      <div class="grid grid-cols-3 gap-6 mt-6">
        <!-- Contoh Data Pasien (Statis) -->
        <?php foreach ($bookings as $booking): ?>
          <?php if ($booking->status != 'canceled'): ?>
            <div class="patient-card">
              <div class="patient-info">
                <div class="flex items-center">
                  <img class="profile-image" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Patient" />
                  <div class="patient-details">
                    <h3 class="patient-name"><?php echo $booking->user_name; ?></h3>
                    <p class="patient-contact"><?php echo $booking->user_email; ?></p>
                  </div>
                </div>
                <div class="doctor-section">
                  <p class="section-label">Psychologist Info</p>
                  <div class="doctor-info">
                    <img class="doctor-image" src="<?php echo base_url('uploads/' . $booking->psychologist_photo); ?>" alt="Psychologist" />
                    <span class="doctor-name ml-2"><?php echo $booking->psychologist_name; ?></span>
                  </div>
                  <div class="schedule-info">
                    <p class="section-label">Estimation Schedule</p>
                    <p class="schedule-time"><?php echo date('d M, Y - H:i', strtotime($booking->booking_date . ' ' . $booking->booking_time)); ?></p>
                  </div>
                </div>
              </div>
              <div class="card-proses">
                <div class="status-card">
                  <span class="status-icon">
                    <?php
                    // Tentukan ikon berdasarkan status
                    switch ($booking->status) {
                      case 'pending':
                        echo '<i class="fas fa-clock" style="color: orange;"></i>'; // Ikon jam untuk pending
                        break;
                      case 'confirmed':
                        echo '<i class="fas fa-check-circle" style="color: green;"></i>'; // Ikon centang untuk confirmed
                        break;
                      case 'canceled':
                        echo '<i class="fas fa-times-circle" style="color: red;"></i>'; // Ikon silang untuk canceled
                        break;
                      case 'finished':
                        echo '<i class="fas fa-flag-checkered" style="color: blue;"></i>'; // Ikon bendera untuk finished
                        break;
                      default:
                        echo '<i class="fas fa-question-circle" style="color: gray;"></i>'; // Ikon pertanyaan untuk status tidak dikenali
                        break;
                    }
                    ?>
                  </span>
                  <span class="status-label">
                    <?php echo ucfirst($booking->status); ?> <!-- Status dengan huruf pertama kapital -->
                  </span>
                </div>
              </div>

            </div>
          <?php endif; ?>
        <?php endforeach; ?>
        <!-- Tambahkan lebih banyak kartu pasien di sini -->
      </div>
    </div>
  </div>
</body>

</html>