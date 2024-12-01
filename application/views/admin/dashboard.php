<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Mental Health Tracker Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="fas fa-heart"></span>
                <span> Mental Health<center>Tracker</center></span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="#" class="active"><span class="las la-tachometer-alt"></span><span> Dashboard </span></a></li>
                <li><a href="#"><span class="las la-chart-bar"></span><span> Analysis </span></a></li>
                <li><a href="#"><span class="las la-comments"></span><span> Counseling </span></a></li>
                <li><a href="#"><span class="las la-file-alt"></span><span> Content </span></a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="user-wrapper">
                <img src="<?php echo base_url('assets/img/2.jpeg') ?>" width="30" height="30" alt="User profile">
                <div>
                    <h4>SAASS</h4>
                    <small>admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>3</h1>
                        <span>Total Accounts</span>
                    </div>
                    <div><span class="las la-users"></span></div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>1</h1>
                        <span>Total Journals</span>
                    </div>
                    <div><span class="las la-book-open"></span></div>
                </div>
            </div>
            <div class="recent-grid">
                <!-- Data User -->
                <div class="data-user">
                    <div class="card">
                        <div class="card-header">
                            <h3>Data User</h3>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Role ID</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sahlah R</td>
                                        <td>sahla@gmail.com</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>Mahmud</td>
                                        <td>Mahmud@gmail.com</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>Dadang</td>
                                        <td>Dadang@gmail.com</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Data Journal -->
                <div class="data-journal">
                    <div class="card">
                        <div class="card-header">
                            <h3>Data Journal</h3>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Journal</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Wopyu</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>