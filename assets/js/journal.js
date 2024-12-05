// Show popup
function showPopup(color) {
    const popup = document.getElementById('popup');
    popup.dataset.color = color;
    console.log("Selected color:", color);
    document.getElementById('note-color').value = color;
    popup.style.display = 'flex';
}

// Close popup
function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
    document.getElementById('note-text').value = ''; // Clear input
    popup.dataset.journalId = ''; // Clear journal ID
}

function selectColor(color) {
    document.getElementById('note-color').value = color;
    document.querySelectorAll('.color').forEach((el) => el.classList.remove('selected'));
    event.target.classList.add('selected');

    showPopup();
}

// Add or Edit Note
function saveNote() {
    const notesContainer = document.querySelector('.notes');
    const color = document.getElementById('popup').dataset.color;
    const text = document.getElementById('note-text').value;
    const popup = document.getElementById('popup');
    const journalId = popup.dataset.journalId || null; // Check if editing existing journal

    if (!text.trim()) {
        alert('Note text cannot be empty!');
        return;
    }

    // Format tanggal sesuai dengan format yang diinginkan
    const date = new Date();
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const formattedDate = date.toLocaleDateString('en-US', options); // "25 May 2020"

    if (journalId) {
        // Update existing journal
        const note = document.querySelector(`.note[data-id="${journalId}"]`);
        note.querySelector('p').textContent = text;
        note.style.backgroundColor = color;
        alert('Journal updated successfully!');
    } else {
        // Create new note element
        const note = document.createElement('div');
        note.classList.add('note');
        note.style.backgroundColor = color; // Apply selected color
        note.dataset.id = new Date().getTime(); // Simulate unique ID for now
        note.innerHTML = `
            <div class="note-header">
                <small>${formattedDate}</small>
            </div>
            <p style="color: white;">${text}</p>
            <div class="actions">
                <button class="favorite-btn" onclick="toggleFavorite(this)">★</button>
                <button class="edit-btn" onclick="editNote(this)">✎</button>
            </div>
        `;
        notesContainer.appendChild(note);
        alert('Journal added successfully!');
    }

    // Close popup and clear input
    closePopup();
}

// Toggle favorite note
function toggleFavorite(btn) {
    btn.classList.toggle('active');
}

// Edit note
function editNote(btn) {
    const note = btn.closest('.note');
    const text = note.querySelector('p').textContent;
    const color = note.style.backgroundColor;
    const journalId = note.dataset.id;

    // Open popup with existing text and set journal ID
    document.getElementById('note-text').value = text;
    const popup = document.getElementById('popup');
    popup.dataset.color = color;
    popup.dataset.journalId = journalId;

    showPopup();
}

// Search notes
document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const notes = document.querySelectorAll('.note');

    notes.forEach((note) => {
        const text = note.querySelector('p').textContent.toLowerCase();
        if (text.includes(query)) {
            note.style.display = 'block';
        } else {
            note.style.display = 'none';
        }
    });
});
