const checkInBtn = document.getElementById("checkInBtn");
const modal = document.getElementById("moodModal");
const closeModal = document.getElementById("closeModal");

checkInBtn.addEventListener("click", () => {
  modal.style.display = "block";
});

closeModal.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

function handleMood(mood) {
  console.log(`Sending mood data: ${mood}`);
  
  // Kirim data ke backend
      fetch('checkin-user', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({mood}),
      })
        .then(response => {
          if (response.ok) {
            return response.json();
          }
          throw new Error('Failed to submit mood');
        })
        .then(data => {
          console.log('Check-in berhasil:', data);
          alert('Mood berhasil dikirim!');
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan. Silakan coba lagi.');
        });
}
