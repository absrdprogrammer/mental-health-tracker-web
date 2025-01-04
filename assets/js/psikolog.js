function openTab(evt, tabName) {
    // Sembunyikan semua konten tab
    var tabContent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabContent.length; i++) {
        tabContent[i].classList.add("hidden");
    }

    // Nonaktifkan semua tablinks
    var tabLinks = document.getElementsByClassName("tablinks");
    for (var i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove("active");
    }

    // Tampilkan konten tab yang diklik
    document.getElementById(tabName).classList.remove("hidden");

    // Tambahkan class 'active' ke tombol yang diklik
    evt.currentTarget.classList.add("active");
}

// Aktifkan tab 'In Queue' secara default saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("tabInQueue").click();
});


function openTab(evt, tabName) {
    // Sembunyikan semua tab
    const tabcontent = document.querySelectorAll(".tabcontent");
    tabcontent.forEach((tab) => tab.classList.add("hidden"));
    
    // Hapus kelas active dari semua tombol tab
    const tablinks = document.querySelectorAll(".tablinks");
    tablinks.forEach((tab) => tab.classList.remove("text-blue-600", "border-blue-600"));

    // Tampilkan tab yang dipilih
    const selectedTab = document.getElementById(tabName);
    if (selectedTab) {
        selectedTab.classList.remove("hidden");
    }

    // Tambahkan style active pada tombol yang diklik
    evt.currentTarget.classList.add("text-blue-600", "border-blue-600");
}

// Menampilkan popup untuk Approve
function showApprovePopup(bookingId) {
    console.log(bookingId);
    const popup = document.getElementById('approvePopup');
    popup.classList.remove('hidden');

    // Kirim permintaan approve ke server
    $.ajax({
        url: "psikolog/approve/" + bookingId,
        type: "POST",
        success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
                alert(result.message);
                location.reload();
            } else {
                alert(result.message);
            }
        },
    });

    // Otomatis menutup popup setelah beberapa detik
    setTimeout(() => {
        popup.classList.add('hidden');
    }, 800); 
}

// Menampilkan popup untuk Decline
function showDeclinePopup(bookingId) {
    document.getElementById('declinePopup').classList.remove('hidden');
    // Simpan bookingId ke input hidden jika diperlukan
    document.getElementById('declineBookingId').value = bookingId;
}

// Menutup popup berdasarkan ID
function closePopup(popupId) {
    document.getElementById(popupId).classList.add('hidden');
}

// Kirim alasan penolakan ke server
function sendDeclineReason() {
    const bookingId = document.getElementById('declineBookingId').value;
    const reason = document.getElementById('declineReason').value;

    if (!reason.trim()) {
        alert("Masukkan alasan penolakan.");
        return;
    }

    $.ajax({
        url: "psikolog/decline",
        type: "POST",
        data: { booking_id: bookingId, reason: reason },
        success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
                alert(result.message);
                location.reload();
            } else {
                alert(result.message);
            }
        },
    });

    // Tutup popup setelah mengirim data
    document.getElementById('declinePopup').classList.add('hidden');
}

function archivePatientWithReason(reason, patientId) {
    const archiveSection = document.getElementById('Archive');
    const patientCard = archiveSection.querySelector(`.patient-card[data-id="${patientId}"]`);

    if (patientCard) {
        const reasonSection = patientCard.querySelector('.rejection-reason');
        reasonSection.querySelector('.reason-text').textContent = reason; // Menampilkan teks dari textarea
        reasonSection.classList.remove('hidden'); // Menampilkan elemen alasan penolakan
    } else {
        console.error(`Patient with ID ${patientId} not found.`);
    }
}

// Toggle dropdown
function toggleDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('hidden');
}

// Tampilkan form edit, sembunyikan tampilan profil
function showEditForm() {
    document.getElementById('profileView').classList.add('hidden');
    document.getElementById('profileEditForm').classList.remove('hidden');
}

// Sembunyikan form edit, tampilkan profil
function hideEditForm() {
    document.getElementById('profileEditForm').classList.add('hidden');
    document.getElementById('profileView').classList.remove('hidden');
}

// Simpan perubahan profil
function saveProfileChanges() {
    const newName = document.getElementById('editProfileName').value;
    const newEmail = document.getElementById('editProfileEmail').value;
    const newImageFile = document.getElementById('editProfileImage').files[0];

    // Update tampilan nama dan email
    if (newName) {
        document.getElementById('profileNameText').innerText = newName;
        document.getElementById('profileNameDisplay').innerText = newName;
    }
    if (newEmail) {
        document.getElementById('profileEmailText').innerText = newEmail;
    }

    // Update foto profil jika ada gambar baru
    if (newImageFile) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profileImagePreview').src = e.target.result;
            document.getElementById('profileImageDisplay').src = e.target.result;
        };
        reader.readAsDataURL(newImageFile);
    }

    // Sembunyikan form edit, tampilkan kembali profil
    hideEditForm();
}
  
  let currentIndex = 0; // Index awal
  const psychologistCards = document.querySelectorAll('.psychologist-info'); // Semua elemen kartu
  
  function updateVisibility() {
      psychologistCards.forEach((card, index) => {
          card.style.display = index === currentIndex ? 'block' : 'none';
      });
  }
  
  function prevPsychologist() {
      currentIndex = (currentIndex - 1 + psychologistCards.length) % psychologistCards.length;
      updateVisibility();
  }
  
  function nextPsychologist() {
      currentIndex = (currentIndex + 1) % psychologistCards.length;
      updateVisibility();
  }
  
  // Pastikan hanya satu kartu terlihat saat halaman dimuat
  document.addEventListener('DOMContentLoaded', updateVisibility);
  
  
