// Sidebar toggle functionality
const sidebarToggle = document.getElementById('sidebar-toggle');
const sidebar = document.getElementById('sidebar');

sidebarToggle.addEventListener('click', () => {
  sidebar.classList.toggle('open');
});

// Function to update the current time
function updateTime() {
  const timeDisplay = document.getElementById("timeDisplay");
  const now = new Date();
  const timeString = now.toLocaleTimeString();
  timeDisplay.textContent = timeString;
}

// Update the time every second
setInterval(updateTime, 1000);

// Initialize the time on page load
updateTime();

// Profile dropdown functionality
document.getElementById('profileIcon').addEventListener('click', function () {
  const dropdownMenu = document.getElementById('dropdownMenu');
  dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});

// Close dropdown if clicking outside
document.addEventListener('click', function (event) {
  const dropdownMenu = document.getElementById('dropdownMenu');
  const profileIcon = document.getElementById('profileIcon');

  if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.style.display = 'none';
  }
});

// Logout confirmation
document.querySelector('a[href="#logout"]').addEventListener('click', function () {
  alert('Logout berhasil!');
});

// Profile preview functionality
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function () {
    const preview = document.getElementById("profilePreview");
    preview.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}