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
function showApprovePopup() {
    const popup = document.getElementById('approvePopup');
    popup.classList.remove('hidden');

    // Otomatis menutup popup setelah beberapa detik
    setTimeout(() => {
        popup.classList.add('hidden');
    }, 800); 
}

// Menampilkan popup untuk Decline
function showDeclinePopup() {
    document.getElementById('declinePopup').classList.remove('hidden');
}

// Menutup popup berdasarkan ID
function closePopup(popupId) {
    document.getElementById(popupId).classList.add('hidden');
}

// Mengirim alasan penolakan
function sendDeclineReason() {
    const reason = document.getElementById('declineReason').value;
    if (reason.trim()) {
        alert(`Alasan penolakan: ${reason}`);
        closePopup('declinePopup');
    } else {
        alert('Harap masukkan alasan penolakan.');
    }
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


function sendDeclineReason() {
    const reason = document.getElementById('declineReason').value; // Ambil teks dari textarea
    const patientId = document.getElementById('declinePopup').getAttribute('data-patient-id'); // Ambil ID pasien

    if (reason.trim()) {
        closePopup('declinePopup');
        archivePatientWithReason(reason, patientId); // Kirim alasan untuk ditampilkan di kartu pasien
    } else {
        alert('Harap masukkan alasan penolakan.');
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
