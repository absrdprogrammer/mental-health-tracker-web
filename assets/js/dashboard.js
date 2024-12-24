// Fungsi untuk toggle sidebar (menyembunyikan atau menampilkan sidebar)
const sidebarToggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');

sidebarToggle.addEventListener('click', () => {
  sidebar.classList.toggle('open'); // Menambahkan atau menghapus kelas 'open' pada sidebar
});

// Fungsi untuk memperbarui waktu saat ini
function updateTime() {
  const timeDisplay = document.getElementById("timeDisplay");
  const now = new Date(); // Mendapatkan waktu saat ini
  const timeString = now.toLocaleTimeString(); // Mengubah waktu menjadi format jam:menit:detik
  timeDisplay.textContent = timeString; // Menampilkan waktu di elemen dengan ID 'timeDisplay'
}

// Memperbarui waktu setiap detik
setInterval(updateTime, 1000);

// Menjalankan fungsi updateTime saat halaman dimuat
updateTime();

// Fungsi untuk menampilkan atau menyembunyikan menu dropdown profil
document.getElementById('profileIcon').addEventListener('click', function () {
  const dropdownMenu = document.getElementById('dropdownMenu');
  dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block'; // Menampilkan atau menyembunyikan menu dropdown
});

// Menutup menu dropdown jika pengguna mengklik di luar elemen dropdown
document.addEventListener('click', function (event) {
  const dropdownMenu = document.getElementById('dropdownMenu');
  const profileIcon = document.getElementById('profileIcon');

  if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.style.display = 'none'; // Menyembunyikan dropdown jika klik di luar area dropdown atau ikon profil
  }
});

// Fungsi untuk menampilkan pesan konfirmasi logout
document.querySelector('a[href="#logout"]').addEventListener('click', function () {
  alert('Logout berhasil!'); // Menampilkan alert dengan pesan logout berhasil
});

// Fungsi untuk menampilkan pratinjau gambar profil yang dipilih
function previewImage(event) {
  const reader = new FileReader(); // Membuat objek FileReader untuk membaca file
  reader.onload = function () {
    const preview = document.getElementById("profilePreview");
    preview.src = reader.result; // Menampilkan gambar yang dipilih di elemen dengan ID 'profilePreview'
  };
  reader.readAsDataURL(event.target.files[0]); // Membaca file yang dipilih dan mengubahnya menjadi URL
}
