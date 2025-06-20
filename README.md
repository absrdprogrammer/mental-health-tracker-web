🌿 Mental Health Tracker Website
Mindful Matters adalah aplikasi web yang dirancang untuk membantu individu memantau kesehatan mental mereka, melakukan refleksi diri melalui jurnal harian, mendapatkan pesan motivasi, serta mempermudah akses layanan konsultasi dengan psikolog secara online.

🚀 Fitur Utama
✅ Booking Psikolog — Pengguna dapat memesan konsultasi dengan psikolog terverifikasi.
✅ Jurnal Harian — Fitur untuk mencatat mood dan aktivitas harian sebagai bentuk refleksi diri.
✅ Pesan Motivasi — Pengguna bisa saling mengirimkan pesan motivasi untuk membangun komunitas yang suportif.
✅ Manajemen Admin — Admin dapat mengelola data pengguna dan psikolog, serta memverifikasi psikolog yang mendaftar.
✅ Approval Psikolog — Psikolog dapat menerima atau menolak permintaan booking dari pengguna.

🛠 Teknologi yang Digunakan
1. Frontend: HTML, CSS, JavaScript, (opsional: Tailwind/Bootstrap)
2. Backend: PHP (CodeIgniter / Framework lain jika ada)
3. Database: MySQL / MariaDB

💻 Cara Menjalankan Project
1. Clone repository ini:
   git clone https://github.com/username/mindful-matters.git
3. Import database:
   1) Buka phpMyAdmin
   2) Import file SQL yang tersedia di folder database/
4. Atur konfigurasi database di:
   application/config/database.php
6. Jalankan di local server (XAMPP / MAMP / Laragon).

🧠 Struktur User
1. Admin: Mengelola dan memverifikasi data
2. User: Booking, jurnal, motivasi
3. Psikolog: Kelola jadwal booking

🔒 Keamanan
1. Autentikasi untuk setiap user
2. Validasi input untuk form booking dan jurnal
3. Hanya psikolog terverifikasi yang bisa menerima booking
