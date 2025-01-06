<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Approval System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/psikolog.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar ">
            <div class="sidebar-content">
                <nav>
                    <!-- Menu Items Group -->
                    <div class="menu-items">
                        <a href="#" class="active">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <!-- Logout Container -->
                    <div class="logout-container">
                        <a href="<?= site_url('Auth_psikolog/logout') ?>">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 3H5C4 3 3 4 3 5V19C3 20 4 21 5 21H14C15 21 16 20 16 19V15H14V19H5V5H14V9H16V5C16 4 15 3 14 3Z" />
                                <path d="M13 12L9 16L9 13H2V11H9V8L13 12Z" transform="translate(8, 0)" />
                            </svg>
                        </a>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <!-- Main Content -->
        <div class="flex-1 ml-16">
            <!-- Header section yang diperbarui -->
            <!-- Header section yang diperbarui -->
            <header class="bg-white border-b border-gray-200">
                <div class="flex justify-between items-center px-4 py-2">
                    <!-- Left side - Breadcrumb -->
                    <div class="flex items-center">
                        <nav class="flex items-center space-x-2 text-sm">
                            <a href="#" class="logo">
                                <img src="assets\img\logo.png" alt="Logo" class="logo-image">
                            </a>
                            <div class="flex items-center">
                                <!-- <a href="#" class="text-gray-500">Patient Queue</a> -->
                                <!-- <span class="text-gray-400 mx-2">/</span> -->
                                <span style="font-weight: bold; color: black; font-size: 1rem; font-family: Arial, sans-serif;">
                                    Approval New Patient
                                </span>
                            </div>
                        </nav>
                    </div>

                    <!-- Right side - Search, Notification, Profile -->
                    <div class="flex items-center space-x-6">
                        <!-- <button class="text-gray-500 hover:text-gray-600" aria-label="Search">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button> -->

                        <div class="relative">
                            <!-- <button class="text-gray-500 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                <span
                                    class="absolute -top-2 -right-2 w-4 h-4 bg-red-500 rounded-full flex items-center justify-center text-md text-white">3</span>
                            </button> -->
                        </div>

                        <!-- Bagian Profil (Trigger Dropdown) -->
                        <div class="relative inline-block text-left">
                            <div class="flex items-center space-x-3 cursor-pointer" onclick="toggleDropdown()">
                                <div class="relative">
                                    <img src="<?php echo base_url('uploads/' . $psychologist->photo); ?>"
                                        alt="Alexander Smith" id="profileImageDisplay"
                                        class="w-8 h-8 rounded-full">
                                    <span class="absolute bottom-0 right-0 w-2 h-2 bg-green-400 rounded-full border-2 border-white"></span>
                                </div>
                                <div class="text-sm">
                                    <p class="font-medium" id="profileNameDisplay"><?php echo $psychologist->full_name; ?></p>
                                    <p class="text-md text-gray-500">as a Psikolog</p>
                                </div>
                            </div>

                            <!-- Dropdown -->
                            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-72 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-50">
                                <!-- Tampilan Profil -->
                                <div id="profileView" class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <img src="<?php echo base_url('uploads/' . $psychologist->photo); ?>"
                                            alt="Profile Picture" id="profileImagePreview"
                                            class="w-16 h-16 rounded-full border">
                                        <div>
                                            <p class="font-semibold" id="profileNameText"><?php echo $psychologist->full_name; ?></p>
                                            <p class="text-gray-500 text-sm" id="profileEmailText"><?php echo $psychologist->email; ?></p>
                                        </div>
                                    </div>
                                    <button onclick="showEditForm()"
                                        class="w-full bg-blue-500 hover:bg-blue-600 text-white text-sm py-2 px-4 rounded">
                                        Edit Profil
                                    </button>
                                </div>

                                <!-- Form Edit Profil -->
                                <div id="profileEditForm" class="hidden space-y-3">
                                    <!-- Edit Foto Profil -->
                                    <div>
                                        <label for="editProfileImage" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                                        <input type="file" id="editProfileImage" accept="image/*" class="w-full text-sm">
                                    </div>

                                    <!-- Edit Nama -->
                                    <div>
                                        <label for="editProfileName" class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" id="editProfileName" placeholder="Masukkan Nama"
                                            class="w-full p-2 border rounded-md">
                                    </div>

                                    <!-- Edit Email -->
                                    <div>
                                        <label for="editProfileEmail" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" id="editProfileEmail" placeholder="Masukkan Email"
                                            class="w-full p-2 border rounded-md">
                                    </div>

                                    <!-- Tombol Simpan & Batal -->
                                    <div class="flex justify-end gap-2">
                                        <button onclick="hideEditForm()"
                                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-3 rounded text-sm">
                                            Batal
                                        </button>
                                        <button onclick="saveProfileChanges()"
                                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
            <div class="p-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <!-- All Apply Queue -->
                    <div class="card1  p-4 shadow rounded-lg">
                        <p class="font-medium text-lg">Total Patients</p>
                        <div class="mt-2">
                            <h3 class="text-3xl font-semibold">432</h3>
                            <p class="text-sm text-white-500">Patient</p>
                        </div>
                    </div>
                    <!-- New Patient Regular -->
                    <div class="card2 p-4 shadow rounded-lg">
                        <p class="font-medium text-lg">New Patient Pending</p>
                        <div class="mt-2">
                            <h3 class="text-3xl font-semibold">432</h3>
                            <p class="text-sm text-white-500">Patient</p>
                        </div>
                    </div>

                    <!-- New Patient Member -->
                    <div class="card3 p-4 shadow rounded-lg">
                        <p class="font-medium text-lg">New Patient Accepted</p>
                        <div class="mt-2">
                            <h3 class="text-3xl font-semibold">432</h3>
                            <p class="text-sm text-white-500">Patient</p>
                        </div>
                    </div>


                    <!-- New Patient Assurance -->
                    <div class="card4 p-4 shadow rounded-lg">
                        <p class="font-medium text-lg">Rejected</p>
                        <div class="mt-2">
                            <h3 class="text-3xl font-semibold">432</h3>
                            <p class="text-sm text-white-500">Patient</p>
                        </div>
                    </div>
                </div>
                <!-- Tabs -->
                <div class="mt-8">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8">
                            <!-- Accepted Tab -->
                            <button id="tabAccepted" onclick="openTab(event, 'Accepted')"
                                class="tablinks text-gray-500 py-4 px-1 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Accepted</button>
                            <!-- In Queue Tab -->
                            <button id="tabInQueue" onclick="openTab(event, 'InQueue')"
                                class="tablinks text-gray-500 py-4 px-1 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">In
                                Queue</button>
                            <!-- Archive Tab -->
                            <button id="tabArchive" onclick="openTab(event, 'Canceled')"
                                class="tablinks text-gray-500 py-4 px-1 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Canceled</button>
                            <button id="tabArchive" onclick="openTab(event, 'Canceled')"
                                class="tablinks text-gray-500 py-4 px-1 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Archieved</button>
                        </nav>
                    </div>
                </div>

                <!-- Tab Content -->
                <div id="Accepted" class="tabcontent hidden mt-4">
                    <p>Daftar pasien yang diterima.</p>
                    <!-- Patient Cards -->
                    <div class="grid grid-cols-3 gap-6 mt-6">
                        <?php foreach ($bookings as $booking): ?>
                            <?php if ($booking->status == 'confirmed'): ?>
                                <div class="patient-card">
                                    <div class="card-header">
                                        <span class="patient-id">#<?php echo $booking->booking_id; ?></span>
                                    </div>

                                    <div class="patient-info">
                                        <div class="flex items-center">
                                            <img class="profile-image"
                                                src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                alt="Patient">
                                            <div class="patient-details">
                                                <h3 class="patient-name"><?php echo $booking->user_name; ?></h3>
                                                <p class="patient-contact"><?php echo $booking->user_email; ?></p>
                                            </div>
                                        </div>

                                        <div class="doctor-section">
                                            <p class="section-label">Psychologist Info</p>
                                            <div class="doctor-info">
                                                <img class="doctor-image"
                                                    src="<?php echo base_url('uploads/' . $booking->psychologist_photo); ?>"
                                                    alt="Psychologist">
                                                <span class="doctor-name ml-2"><?php echo $booking->psychologist_name; ?></span>
                                            </div>

                                            <div class="schedule-info">
                                                <p class="section-label">Estimation Schedule</p>
                                                <p class="schedule-time"><?php echo date('d M, Y - H:i', strtotime($booking->booking_date . ' ' . $booking->booking_time)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div id="InQueue" class="tabcontent mt-4">
                    <p>Daftar pasien dalam antrean.</p>
                    <!-- Patient Cards -->
                    <div class="grid grid-cols-3 gap-6 mt-6">
                        <?php foreach ($bookings as $booking): ?>
                            <?php if ($booking->status == 'pending'): ?>
                                <div class="patient-card">
                                    <div class="card-header">
                                        <span class="patient-id">#<?php echo $booking->booking_id; ?></span>
                                    </div>

                                    <div class="patient-info">
                                        <div class="flex items-center">
                                            <img class="profile-image"
                                                src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                alt="Patient">
                                            <div class="patient-details">
                                                <h3 class="patient-name"><?php echo $booking->user_name; ?></h3>
                                                <p class="patient-contact"><?php echo $booking->user_email; ?></p>
                                            </div>
                                        </div>

                                        <div class="doctor-section">
                                            <p class="section-label">Psychologist Info</p>
                                            <div class="doctor-info">
                                                <img class="doctor-image"
                                                    src="<?php echo base_url('uploads/' . $booking->psychologist_photo); ?>"
                                                    alt="Psychologist">
                                                <span class="doctor-name ml-2"><?php echo $booking->psychologist_name; ?></span>
                                            </div>

                                            <div class="schedule-info">
                                                <p class="section-label">Estimation Schedule</p>
                                                <p class="schedule-time"><?php echo date('d M, Y - H:i', strtotime($booking->booking_date . ' ' . $booking->booking_time)); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-actions">
                                        <button class="btn btn-decline" onclick="showDeclinePopup('<?php echo $booking->booking_id; ?>')">Decline</button>
                                        <button class="btn btn-approve" onclick="showApprovePopup('<?php echo $booking->booking_id; ?>')">Approve</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div id="approvePopup" class="popup hidden">
                        <div class="popup-content">
                            <span class="close" onclick="acceptPatient()">&times;</span>
                            <div class="success-icon">✔</div>
                            <p>Pasien berhasil diterima!</p>
                        </div>
                    </div>


                    <!-- Decline Popup -->
                    <div id="declinePopup" class="popup hidden">
                        <div class="popup-content">
                            <span class="close" onclick="closePopup('declinePopup')">&times;</span>
                            <h3>Masukkan alasan penolakan:</h3>
                            <textarea id="declineReason" placeholder="Ketik alasan di sini..."></textarea>
                            <!-- Hidden input untuk menyimpan booking_id -->
                            <input type="hidden" id="declineBookingId">
                            <button class="btn btn-send" onclick="sendDeclineReason()">Kirim</button>
                        </div>
                    </div>
                </div>


                <div id="Canceled" class="tabcontent hidden mt-4">
                    <p>Daftar pasien yang ditolak.</p>
                    <!-- Patient Cards -->
                    <div class="grid grid-cols-3 gap-6 mt-6">
                        <?php foreach ($bookings as $booking): ?>
                            <?php if ($booking->status == 'canceled'): ?>
                                <div class="patient-card">
                                    <div class="card-header">
                                        <span class="patient-id">#<?php echo $booking->booking_id; ?></span>
                                    </div>

                                    <div class="patient-info">
                                        <div class="flex items-center">
                                            <img class="profile-image"
                                                src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                alt="Patient">
                                            <div class="patient-details">
                                                <h3 class="patient-name"><?php echo $booking->user_name; ?></h3>
                                                <p class="patient-contact"><?php echo $booking->user_email; ?></p>
                                            </div>
                                        </div>

                                        <div class="doctor-section">
                                            <p class="section-label">Psychologist Info</p>
                                            <div class="doctor-info">
                                                <img class="doctor-image"
                                                    src="<?php echo base_url('uploads/' . $booking->psychologist_photo); ?>"
                                                    alt="Psychologist">
                                                <span class="doctor-name ml-2"><?php echo $booking->psychologist_name; ?></span>
                                            </div>

                                            <div class="schedule-info">
                                                <p class="section-label">Estimation Schedule</p>
                                                <p class="schedule-time"><?php echo date('d M, Y - H:i', strtotime($booking->booking_date . ' ' . $booking->booking_time)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url('assets/js/psikolog.js'); ?>"></script>
</body>

</html>