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
