const currentDate = new Date();
const currentDay = currentDate.getDate();
const currentMonth = currentDate.getMonth();
const currentYear = currentDate.getFullYear();

// Menampilkan tanggal hari ini
document.getElementById("current-date").textContent = `${currentDay} ${getMonthName(currentMonth)} ${currentYear}`;

let currentWeekStart = getStartOfWeek(currentDate);
let currentWeekEnd = new Date(currentWeekStart);
currentWeekEnd.setDate(currentWeekStart.getDate() + 6);

// Menampilkan tanggal-tanggal dalam kalender hanya untuk minggu ini
const calendarContainer = document.querySelector(".calendar-dates");
generateWeek(currentWeekStart, currentWeekEnd);

// Fungsi untuk menghasilkan minggu pada kalender
function generateWeek(start, end) {
  calendarContainer.innerHTML = "";

  const weekElement = document.createElement("div");
  weekElement.classList.add("week");

  for (let i = start.getDate(); i <= end.getDate(); i++) {
    const dateElement = document.createElement("div");
    dateElement.classList.add("date");
    dateElement.textContent = i;

    if (i === currentDay) {
      dateElement.classList.add("today");
    }

    dateElement.addEventListener("click", () => handleCheckIn(i, dateElement));

    weekElement.appendChild(dateElement);
  }

  calendarContainer.appendChild(weekElement);
}

function handleCheckIn(day, element) {
  element.classList.add("checked");
  document.getElementById("mood-selection-message").textContent = `You checked in on ${day} ${getMonthName(currentMonth)}!`;
}

function getMonthName(monthIndex) {
  const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
  return months[monthIndex];
}

// Fungsi untuk mendapatkan awal minggu dari tanggal tertentu
function getStartOfWeek(date) {
  const day = date.getDay() || 7;
  const diff = date.getDate() - day + 1;
  const startOfWeek = new Date(date);
  startOfWeek.setDate(diff);
  startOfWeek.setHours(0, 0, 0, 0);
  return startOfWeek;
}

// Fungsi untuk menavigasi minggu ke belakang
document.getElementById("prev-week").addEventListener("click", () => {
  currentWeekStart.setDate(currentWeekStart.getDate() - 7);
  currentWeekEnd.setDate(currentWeekEnd.getDate() - 7);
  generateWeek(currentWeekStart, currentWeekEnd);
});

// Fungsi untuk menavigasi minggu ke depan
document.getElementById("next-week").addEventListener("click", () => {
  currentWeekStart.setDate(currentWeekStart.getDate() + 7);
  currentWeekEnd.setDate(currentWeekEnd.getDate() + 7);
  generateWeek(currentWeekStart, currentWeekEnd);
});

// Fungsi untuk menutup modal
document.getElementById("closeModal").addEventListener("click", () => {
  document.getElementById("moodModal").style.display = "none";
});

// Menampilkan modal ketika tombol check-in di-klik (misalnya)
document.getElementById("checkInBtn").addEventListener("click", () => {
  document.getElementById("moodModal").style.display = "block";
});
