<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MindfulMatters</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="sidebar-toggle" id="sidebar-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="menu">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i></a></li>
                <li><a href="#"><i class="fas fa-calendar-check"></i></a></li>
                <li><a href="#"><i class="fas fa-user-injured"></i></a></li>
                <li><a href="#"><i class="fas fa-flask"></i></a></li>
            </ul>
                    
        </div>

        <!-- Main Content -->
        <main class="content">
            <div class="logo-container">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo" />
                <span class="site-name">MindfulMatters</span>
                <div class="actions-container">
                    <div class="search-container">
                        <input type="text" placeholder="Search something..." class="search-bar" />
                        <button class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="add-patient-btn">+</button>
                </div>
            </div>
            <header class="header-highlight">
                <div class="highlight-box">
                    <div class="text-section">
                        <h1>Hi, Bestie!</h1>
                        <p>
                            You've been doing your whole work plan for the last two months. Way to go 👍
                        </p>
                    </div>
                    <div class="image-section">
                        <img src="<?php echo base_url('assets/img/pil.png'); ?>" alt="Decorative pills" />
                    </div>
                </div>
                <div class="stats-section">
                    <div class="stats-card">
                        <h2>+11</h2>
                        <p>Reviews</p>
                        <canvas class="stat-chart"></canvas>
                    </div>
                    <div class="stats-card">
                        <h2>+78</h2>
                        <p>Patients</p>
                        <canvas class="stat-chart"></canvas>
                    </div>
                </div>
            </header>

            <h3>Your Progress</h3>
            <section class="analytics">
                <div class="analytics-card journey">
                    <i class="fas fa-note-sticky"></i>
                    <div class="text-container">
                        <h3>Your Journey</h3>
                        <p>You're on the right path!</p>
                    </div>
                </div>
                <div class="analytics-card goals">
                    <i class="fas fa-clipboard-list"></i>
                    <div class="text-container">
                        <h3>Goals</h3>
                        <p>125 for the month</p>
                    </div>
                </div>
                <div class="analytics-card progress">
                    <i class="fas fa-file-waveform"></i>
                    <div class="text-container">
                        <h3>Total Wellness Progress</h3>
                        <p>20+</p>
                    </div>
                </div>
            </section>

            <div class="weekly-analytics">
                <div class="charts-container">
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

                    <!-- Pie Chart Card -->
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
            </div>
        </main>

        <div class="profile">
            <div class="profile-header">
                <div class="image-container">
                    <img src="<?php echo base_url('assets/img/gr.png'); ?>" alt="Profile Image" class="profile-img" id="profileImg" />
                    <button class="edit-btn" onclick="window.location.href='edit-profile.html'">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
                <div class="profile-info">
                    <h4 id="userName">[Name]</h4>
                    <p id="userRole">[Role]</p>
                </div>
            </div>
            <div class="personal-info">
                <h3>Personal Information</h3>
                <ul>
                    <li>Email: <span id="userEmail">[Email]</span></li>
                    <li>Phone: <span id="userPhone">[Phone]</span></li>
                    <li>Address: <span id="userAddress">[Address]</span></li>
                </ul>
            </div>

            <div class="mood-tracker">
                <h3>How is today?</h3>
                <div class="mood-options">
                    <button class="mood-btn" data-mood="Happy">
                        <i class="fas fa-smile" style="color: #ff6384"></i>
                        <span>Happy</span>
                    </button>
                    <button class="mood-btn" data-mood="Neutral">
                        <i class="fas fa-meh" style="color: #f6d750"></i>
                        <span>Neutral</span>
                    </button>
                    <button class="mood-btn" data-mood="Sad">
                        <i class="fas fa-frown" style="color: #ff4500"></i>
                        <span>Sad</span>
                    </button>
                </div>
            </div>

            <!-- Progress -->
            <div class="progress-section">
                <h3>Progress</h3>
                <div class="progress-bar">
                    <div id="progressFill" class="progress-fill" style="width: 70%">70%</div>
                </div>
                <small>Based on your recent activities.</small>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo base_url('assets/js/chart.js'); ?>"></script>
</body>

</html>