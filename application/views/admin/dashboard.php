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

            <section class="analytics">
                <div class="analytics-card total-accounts">
                    <i class="fas fa-user"></i>
                    <div class="text-container">
                        <h3>Total Accounts</h3>
                        <p><?= $counts['total_users'] ?></p>
                    </div>
                </div>
                <div class="analytics-card total-journal">
                    <i class="fas fa-book"></i>
                    <div class="text-container">
                        <h3>Total Journal</h3>
                        <p><?= $counts['total_journals'] ?></p>
                    </div>
                </div>
                <div class="analytics-card total-post">
                    <i class="fas fa-pencil-alt"></i>
                    <div class="text-container">
                        <h3>Total Post</h3>
                        <p><?= $counts['total_messages'] ?></p>
                    </div>
                </div>
            </section>

            <section class="tables-section">
                <div class="tables-container">
                    <!-- Table Pengguna -->
                    <div class="table-box">
                        <div class="table-header">
                            <h3>Data Pengguna</h3>
                            <a href="<?php echo base_url('admin/daftaruser'); ?>" class="see-all-btn">See All</a>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($user->full_name); ?></td>
                                            <td><?= htmlspecialchars($user->email); ?></td>
                                            <td><?= $user->is_active ? 'Active' : 'Inactive'; ?></td>
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

                    <!-- Table Psikolog -->
                    <div class="table-box">
                        <div class="table-header">
                            <h3>Data Psikolog</h3>
                            <a href="<?php echo base_url('admin/daftarpsikolog'); ?>" class="see-all-btn">See All</a>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($psychologists)): ?>
                                    <?php foreach ($psychologists as $psychologist): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($psychologist->full_name); ?></td>
                                            <td><?= htmlspecialchars($psychologist->email); ?></td>
                                            <td><?= $psychologist->is_active ? 'Active' : 'Inactive'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3">No psychologists found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <div class="weekly-analytics">
                <div class="charts-container">
                    <div class="chart-box">
                        <h3>
                            Daily Mood Overview
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
                    <div class="chart-box">
                        <h3>
                            Sentiment Overview
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

        <!-- Calendar Section -->
        <div class="calendar-container" id="calendar">
            <div class="calendar-body">
                <div class="calendar-header">
                    <h3>Calendar</h3>
                </div>
                <div class="calendar-navigation">
                    <button id="prevMonth" class="nav-btn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="calendar-month-year" id="currentMonthYear"></span>
                    <button id="nextMonth" class="nav-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="calendar-grid" id="calendarGrid"></div>
            </div>
            <div class="current-time">
                <h3>Current Time</h3>
                <div id="timeDisplay" class="time-display">--:--:--</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo base_url('assets/js/chart_admin.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/kalender-admin.js'); ?>"></script>
</body>

</html>
