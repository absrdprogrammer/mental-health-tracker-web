<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>

<body>
    <div class="dashboard-list">
        <!-- Sidebar -->
        <div class="sidebar-list">
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
                        <img src="<?php echo base_url('assets/img/profile-default.jpg'); ?>" alt="User Avatar" class="profile-icon" id="profileIcon">
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
                <div class="table-box-psikolog">
                    <div class="table-header">
                        <h3>Account Approval Requests</h3>
                    </div>
                    <table class="data-table-psikolog">
                        <thead>
                            <tr>
                                <th>Tanggal Register</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat Klinik</th>
                                <th>Sertifikat</th> <!-- New column for certificate -->
                                <th>Foto</th> <!-- New column for photo -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($psychologists)): ?>
                                <?php foreach ($psychologists as $psychologist): ?>
                                    <tr>
                                        <td><?php echo date('Y-m-d', strtotime($psychologist->created_at)); ?></td>
                                        <td><?= htmlspecialchars($psychologist->full_name); ?></td>
                                        <td><?= htmlspecialchars($psychologist->email); ?></td>
                                        <td><?= htmlspecialchars($psychologist->clinic_location); ?></td>
                                        <td>
                                            <a href="<?= base_url('uploads/' . $psychologist->certificate) ?>" target="_blank">
                                                <i class="fas fa-file-alt" style="color: blue;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('uploads/' . $psychologist->photo) ?>" target="_blank">
                                                <i class="fas fa-image" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="status-wrapper">
                                                <!-- Approve Button -->
                                                <button onclick="showConfirmationModal('approve', <?= $psychologist->id; ?>)" title="Approve" class="action-btn approve">
                                                    <i class="fas fa-check-square"></i> <!-- Approve Icon -->
                                                </button>
                                                <!-- Decline Button -->
                                                <button onclick="showConfirmationModal('decline', <?= $psychologist->id; ?>)" title="Decline" class="action-btn decline">
                                                    <i class="fas fa-times-square"></i> <!-- Decline Icon -->
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10">No psychologists found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalLabel">
                                <i class="fas fa-exclamation-circle"></i> Confirm Action
                            </h5>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body text-center">
                            <p id="modalMessage" class="fw-bold">Are you sure you want to perform this action?</p>
                            <i class="fas fa-question-circle fa-3x text-warning"></i>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary flex-fill me-2" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button id="confirmButton" type="button" class="btn btn-primary flex-fill ms-2">
                                <i class="fas fa-check"></i> Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                let currentAction = '';
                let currentId = '';

                // Function to show the confirmation modal
                function showConfirmationModal(action, id) {
                    currentAction = action;
                    currentId = id;

                    const modalMessage = document.getElementById('modalMessage');
                    if (action === 'approve') {
                        modalMessage.textContent = 'Are you sure you want to approve this account?';
                    } else if (action === 'decline') {
                        modalMessage.textContent = 'Are you sure you want to decline this account?';
                    }

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                    modal.show();
                }

                // Handle the confirm button click
                document.getElementById('confirmButton').addEventListener('click', function() {
                    if (currentAction === 'approve') {
                        $.ajax({
                            url: "approve/" + currentId,
                            type: "POST",
                            success: function(response) {
                                const result = JSON.parse(response);
                                if (result.status === "success") {
                                    alert(result.message);
                                    location.reload();
                                } else {
                                    alert(result.message);
                                }
                            },
                        });
                    } else if (currentAction === 'decline') {
                        $.ajax({
                            url: "decline/" + currentId,
                            type: "POST",
                            success: function(response) {
                                const result = JSON.parse(response);
                                if (result.status === "success") {
                                    alert(result.message);
                                    location.reload();
                                } else {
                                    alert(result.message);
                                }
                            },
                        });
                    }
                });
            </script>

</body>

</html>