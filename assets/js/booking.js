const bookingBtn = document.getElementById("bookingBtn");
const bookingModal = document.getElementById("bookingModal");
const closeBookingModal = document.getElementById("closeBookingModal");

bookingBtn.addEventListener("click", () => {
  bookingModal.style.display = "block";
});

closeBookingModal.addEventListener("click", () => {
  bookingModal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === bookingModal) {
    bookingModal.style.display = "none";
  }
});

document.getElementById("bookingForm").addEventListener("submit", (event) => {
  event.preventDefault();
  const date = document.getElementById("bookingDate").value;
  const time = document.getElementById("bookingTime").value;
  alert(`Booking berhasil untuk tanggal ${date} pukul ${time}.\n\nMohon menunggu konfirmasi lebih lanjut dari psikolog kami.`);
  bookingModal.style.display = "none";
});
