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


function saveNotes(textareaId) {
    const textareaValue = document.getElementById(textareaId).value;
    if (textareaValue.trim()) {
        alert("Catatan berhasil disimpan:\n" + textareaValue);
        // Di sini Anda bisa menambahkan logika untuk menyimpan ke database atau API.
        console.log("Saved note:", textareaValue);
    } else {
        alert("Mohon isi catatan terlebih dahulu.");
    }
}


// Fungsi untuk menyimpan teks dari textarea dan menampilkan keterangan
// function saveNotes(textAreaId) {
//     const textArea = document.getElementById(textAreaId); // Ambil textarea
//     const notes = textArea.value.trim(); // Ambil teks dari textarea

//     if (notes) {
//         const notesDisplay = document.getElementById(`notes-display-${textAreaId.split('-')[1]}`); // Ambil elemen keterangan
//         const notesInput = document.getElementById(`notes-input-${textAreaId.split('-')[1]}`); // Ambil div textarea + button

//         // Tampilkan keterangan
//         notesDisplay.textContent = `Keterangan: ${notes}`;
//         notesDisplay.classList.remove('hidden');

//         // Sembunyikan textarea dan tombol kirim
//         notesInput.classList.add('hidden');
//     } else {
//         alert("Harap masukkan keterangan terlebih dahulu.");
//     }
// }

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
const psychologists = [
    {
      name: "Dr. Dianne Rachel",
      title: "Experienced Psychologist",
      image: "img/download (3).jpeg",
    },
    {
      name: "Dr. John Smith",
      title: "Clinical Psychologist",
      image: "img/download (4).jpeg",
    },
    {
      name: "Dr. Susan Lee",
      title: "Child Psychologist",
      image: "img/download (5).jpeg",
    },
  ];
  
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
  
  
