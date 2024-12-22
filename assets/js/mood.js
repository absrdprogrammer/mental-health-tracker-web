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
});

closeModal.addEventListener("click", (event) => {
  event.stopPropagation();
  modal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

moodButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const selectedMood = button.dataset.mood;
    button.textContent = `Checked in on ${currentDay} ${getMonthName(currentMonth)} ${currentYear} - Mood: ${selectedMood}`;
    modal.style.display = "none";
  });
});
