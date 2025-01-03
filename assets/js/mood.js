const checkInBtn = document.getElementById("checkInBtn");
const modal = document.getElementById("moodModal");
const closeModal = document.getElementById("closeModal");
const moodButtons = document.querySelectorAll(".mood-btn");
const currentDate = new Date();
const currentDay = currentDate.getDate();
const currentMonth = currentDate.getMonth();
const currentYear = currentDate.getFullYear();

function getMonthName(monthIndex) {
  const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
  return months[monthIndex];
}

checkInBtn.addEventListener("click", () => {
  modal.style.display = "block";
  console.log("checkin button clicked");
});

closeModal.addEventListener("click", (event) => {
  event.stopPropagation();
  modal.style.display = "none";
  console.log("close modal button clicked");
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


document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.mood-btn');
  console.log('Buttons:', buttons); 

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const mood = button.getAttribute('data-mood');
      console.log('Mood:', mood);

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
    });
  });
});
