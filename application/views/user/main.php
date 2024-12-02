<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MindfulMatters</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>" />
</head>

<body>
    <div class="dashboard">
        <div class="main-content">
            <!-- Search Bar and Greeting -->
            <div class="header">
                <div class="logo-container">
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo" />
                    <span class="site-name">MindfulMatters</span>
                </div>
                <div class="actions-container">
                    <div class="search-container">
                        <input type="text" placeholder="Search something..." class="search-bar" />
                        <button class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="add-patient-btn">+ Add Patient</button>
                </div>
            </div>

            <!--greeting card-->
            <div class="card-container">
                <div class="greeting-card">
                    <div class="greeting-text">
                        <h1>Hi, Jennifer!</h1>
                        <p>You've been taking great strides on your journey to better mental well-being.
                            <br>Remember, every small step forward is a victory worth celebrating. 🌟
                        </p>
                    </div>
                    <div class="greeting-image">
                        <img src="<?php echo base_url('assets/img/hearth.png'); ?>" alt="Image" />
                    </div>
                </div>

                <div class="metric-card">
                    <h3>+11</h3>
                    <p>reviews</p>
                </div>

                <div class="metric-card">
                    <h3>+78</h3>
                    <p>patients</p>
                </div>
            </div>

            <!-- Patient Analytics Section -->
            <h4>Patient Analytics</h4>
            <div class="patient-analytics">
                <div class="card appointments">
                    <div class="card-text">
                        <h3>Appointments Today</h3>
                        <p>16 persons</p>
                    </div>
                </div>
                <div class="card new-patients">
                    <div class="card-text">
                        <h3>New Patients</h3>
                        <p>125 for the month</p>
                    </div>
                </div>
                <div class="card total-patients">
                    <div class="card-text">
                        <h3>Total Patients</h3>
                        <p>2000+</p>
                    </div>
                </div>
            </div>

            <!-- Weekly Analytics Section -->
            <div class="weekly-analytics">
                <div class="charts-container">
                    <div class="chart-box">
                        <h3>
                            This Week's Analytics Overview
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

                    <!-- Kartu untuk Pie Chart -->
                    <div class="chart-box">
                        <h3>
                            Progress Overview
                            <div class="chart-options">
                                <button id="pieChartBtn" class="btn active">
                                    <i class="fas fa-chart-pie"></i>
                                </button>
                            </div>
                        </h3>
                        <div class="chart-container">
                            <canvas id="pieChartCanvas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="sidebar">
            <div class="profile">
                <div class="image-container">
                    <img src="<?php echo base_url('assets/img/gr.png'); ?>" alt="Jennifer's Profile" class="profile-img" />
                    <button class="edit-btn" onclick="window.location.href='edit-profile.html'">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </div>
                <div class="profile-info">
                    <h4>Jennifer Turner</h4>
                    <p>Cardiologist</p>
                </div>
            </div>

            <div class="notifications-section">
                <h3>Notifications</h3>
                <div class="notification-list">
                    <div class="notification-item">
                        <p>The patient will come to you in 5 minutes.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="<?php echo base_url('assets/js/chart.js'); ?>"></script>
</body>

</html>