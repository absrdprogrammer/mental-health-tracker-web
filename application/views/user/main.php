<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MindfulMatters</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
    <div class="menu-top">
          <button class="home-btn">
            <i class="fas fa-home"></i>
          </button>
          <a href="status_booking.php">
            <button class="calendar-btn">
              <i class="fas fa-calendar"></i>
            </button>
          </a>
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

      

      <!-- Highlight Box -->
      <header class="header-highlight">
        <div class="highlight-box">
          <div class="text-section">
            <h1>Hi, Bestie!</h1>
            <p>You've been doing your whole work plan for the last two months. Way to go 👍</p>
          </div>
          <div class="image-section">
            <img src="<?php echo base_url('assets/img/hrt.png'); ?>" alt="Decorative pills" />
          </div>
        </div>
        <div class="stats-section">
          <!-- Journal Card -->
          <div class="stats-card stats-journal" onclick="window.location.href='<?= site_url('journal') ?>'">
            <h2>Journal</h2>
            <p>View Your Journals</p>
            <i class="fas fa-book-open"></i>
          </div>

          <!-- Wordspace Card (Motivation) -->
          <div class="stats-card stats-wordspace" onclick="window.location.href='<?= site_url('wordspace') ?>'">
            <div class="decoration">
              <i class="fas fa-comments"></i>
              <p>Stay Motivated!</p>
            </div>
          </div>
        </div>
      </header>

      <!-- Motivational Cards -->
      <h3>Empower Your Mind</h3>
      <section class="motivation-cards">
        <!-- Motivational Card 1: Quote -->
        <div class="motivation-card journey">
          <div class="text-container">
            <i class="fas fa-quote-left text-5xl text-orange-500 mb-4 mt-9"></i>
            <p class="testimonial-text">Your mental health is a priority. <br />Your happiness is an essential. <br />Your self-care is a necessity.</p>
          </div>
        </div>

        <!-- Motivational Card 2: Goals -->
        <div class="motivation-card goals">
          <div class="text-container">
            <i class="fas fa-smile"></i>
            <p class="testimonial-text">Dream big, work hard, stay focused, and make it happen.</p>
          </div>
        </div>

        <!-- Motivational Card Strength -->
        <div class="motivation-card strength">
          <div class="text-container">
            <i class="fas fa-heart"></i>
            <p class="testimonial-text">You are stronger than you think.</p>
          </div>
        </div>

        <!-- Motivational Card Lightning -->
        <div class="motivation-card lightning">
          <div class="text-container">
            <i class="fas fa-sun"></i>
            <p class="testimonial-text">There is light within you, <br />even on the darkest days. <br />Keep going — you matter.</p>
          </div>
        </div>
      </section>

      <div class="weekly-analytics">
        <div class="charts-calendar-container">
          <!-- Container Grafik Mingguan -->
          <div class="charts-container">
            <!-- Chart Box 1: Weekly Progress -->
            <div class="chart-box">
              <h3>
                Your Weekly Progress
                <div class="chart-options">
                  <button id="barChartBtn" class="btn active">
                    <i class="fas fa-chart-bar"></i>
                  </button>
                  <button id="lineChartBtn" class="btn">
                    <i class="fas fa-chart-line"></i>
                  </button>
                </div>
              </h3>
              <div class="chart-container">
                <canvas id="barChartCanvas"></canvas>
              </div>
            </div>

            <!-- Chart Box 2: Mood Tracker -->
            <div class="chart-box">
              <h3>
                Mood Tracker
                <div class="chart-options">
                  <button id="pieChartBtn" class="btn active">
                    <i class="fas fa-chart-pie"></i>
                  </button>
                </div>
              </h3>
              <div class="chart-container">
                <canvas id="pieChartCanvas"></canvas>
              </div>
            </div>
          </div>

          <!-- Kartu Buat Janji dengan Psikolog -->
          <div class="psychologist-card">
            <h2 class="card-title">Our Psychologists</h2>
            <div class="carousel-card">
              <button class="nav-btn left-btn" onclick="prevPsychologist()">
                <i class="fas fa-chevron-left"></i>
              </button>

              <div class="psychologist-info-wrapper">
                <?php foreach ($psychologists as $index => $psychologist): ?>
                  <div class="psychologist-info" data-id="<?php echo $psychologist->id; ?>">
                    <div class="psychologist-image-wrapper">
                      <img id="psychologistImage" src="<?php echo base_url('uploads/' . $psychologist->photo); ?>" alt="Psychologist" />
                    </div>
                    <h3 class="psychologist-name"><?php echo $psychologist->full_name; ?></h3>
                    <p id="psychologistTitle" class="psychologist-title">Experienced Psychologist</p>
                    <button class="booking-btn" id="bookingBtn" onclick="openBookingModal(<?php echo $psychologist->id; ?>)">Booking Psikolog</button>
                  </div>
                <?php endforeach; ?>
              </div>

              <button class="nav-btn right-btn" onclick="nextPsychologist()">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </div>

          <!-- Popup untuk Booking Psikolog -->
          <div id="bookingModal" class="modal">
            <div class="modal-content">
              <span class="close" id="closeBookingModal">&times;</span>
              <div class="modal-flex-container">
                <!-- Form Booking -->
                <div class="form-container">
                  <h3>Pilih Waktu dan Tanggal</h3>
                  <form id="bookingForm">
                    <div class="date-time-container">
                      <div>
                        <label for="bookingDate">Tanggal</label>
                        <input type="date" id="bookingDate" required />
                      </div>
                      <div>
                        <label for="bookingTime">Waktu</label>
                        <input type="time" id="bookingTime" required />
                      </div>
                    </div>
                    <button type="submit" class="confirm-btn">Konfirmasi Booking</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?php echo base_url('assets/js/chart_main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/calander.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/psikolog.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/tracker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/mood.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/booking.js'); ?>"></script>
</body>

</html>