let currentColor = '#F97316'; // Default color 

// Fungsi untuk memilih warna latar belakang
function setColor(color) {
    if (/^#[0-9A-F]{6}$/i.test(color)) {
        currentColor = color;
    } else {
        console.warn('Invalid color format, using default #F97316');
        currentColor = '#F97316'; 
    }
}


// Fungsi untuk menutup popup
function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none'; 
    currentColor = '#F97316';
}

// Fungsi untuk membuka popup
function openPopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex';
}

// Fungsi untuk menyimpan catatan
function saveNote() {
    const content = document.getElementById('noteContent').value;

    // Limit content to 250 characters
    const maxLength = 250;
    const truncatedContent = content.length > maxLength ? content.slice(0, maxLength) + '...' : content;

    if (content) {
        console.log('Saving note:', truncatedContent);

        // Membuat elemen card baru untuk catatan
        const noteCard = document.createElement('div');
        noteCard.classList.add('note-card', 'shadow-lg', 'rounded-lg', 'p-6', 'mb-6', 'transition-transform', 'hover:scale-105');
        noteCard.style.backgroundColor = currentColor; 
        noteCard.style.position = 'relative'; 
        noteCard.style.padding = '20px'; 
        noteCard.style.maxWidth = '100%'; 

        // Menambahkan ikon sebelum konten (kiri)
        const iconElementBefore = document.createElement('i');
        iconElementBefore.classList.add('fas', 'fa-quote-left', 'text-xl', 'text-white', 'block', 'mb-4');
        noteCard.appendChild(iconElementBefore);

        // Menambahkan konten catatan (dengan pembatasan 250 karakter)
        const noteContent = document.createElement('p');
        noteContent.classList.add('text-lg', 'font-semibold', 'text-white');
        noteContent.textContent = truncatedContent;

        // Pastikan konten membungkus dan tidak melampaui batas card
        noteContent.style.wordWrap = 'break-word'; // Memastikan kata panjang terputus dan tidak overflow
        noteContent.style.whiteSpace = 'normal'; // Menyebabkan teks untuk membungkus
        noteContent.style.overflow = 'hidden'; // Menghindari overflow
        noteCard.appendChild(noteContent);

        // Menambahkan ikon setelah konten (kanan)
        const iconElementAfter = document.createElement('i');
        iconElementAfter.classList.add('fas', 'fa-quote-right', 'text-xl', 'text-white', 'block', 'mt-4');
        
        // Menggunakan absolute positioning untuk menempatkan ikon di kanan bawah
        iconElementAfter.style.position = 'absolute';
        iconElementAfter.style.right = '10px'; // Geser ikon ke kanan
        iconElementAfter.style.bottom = '10px'; // Geser ikon ke bawah

        noteCard.appendChild(iconElementAfter);

        // Menambahkan card baru ke dalam grid
        cardsGrid.appendChild(noteCard);

        // Menutup popup setelah menyimpan
        closePopup();

        // Reset input setelah menyimpan
        document.getElementById('noteContent').value = '';
        currentColor = '#F97316';
    } else {
        alert("Please fill in the content.");
    }
}

// Mengambil elemen yang diperlukan
const searchInput = document.getElementById('searchInput');
const cardsGrid = document.getElementById('cardsGrid');

// Fungsi untuk mencari dan memfilter semua card berdasarkan deskripsi
function searchNotes() {
    const searchTerm = searchInput.value.toLowerCase();
    const cards = cardsGrid.getElementsByClassName('note-card');

    Array.from(cards).forEach(card => {
        const text = card.querySelector('p') ? card.querySelector('p').innerText.toLowerCase() : '';

        if (text.includes(searchTerm)) {
            card.style.display = ''; // Tampilkan card
        } else {
            card.style.display = 'none'; // Sembunyikan card
        }
    });
}


