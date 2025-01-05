// document.getElementById("bookingForm").addEventListener("submit", (event) => {
//   event.preventDefault();
//   const date = document.getElementById("bookingDate").value;
//   const time = document.getElementById("bookingTime").value;
//   alert(`Booking berhasil untuk tanggal ${date} pukul ${time}.\n\nMohon menunggu konfirmasi lebih lanjut dari psikolog kami.`);
//   bookingModal.style.display = "none";
// });

function openBookingModal(psychologistId) {
  console.log(psychologistId);
  // Tampilkan modal booking
  const bookingModal = document.getElementById("bookingModal");
  bookingModal.style.display = "block";

  // Simpan psychologistId untuk pengiriman
  const bookingForm = document.getElementById("bookingForm");
  bookingForm.dataset.psychologistId = psychologistId;
}

// Submit form booking
document.getElementById("bookingForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const psychologistId = this.dataset.psychologistId;
  const bookingDate = document.getElementById("bookingDate").value;
  const bookingTime = document.getElementById("bookingTime").value;

  console.log("Psychologist ID disimpan di form:", bookingForm.dataset.psychologistId);
  console.log("Booking date disimpan di form:", bookingDate);
  console.log("Booking time disimpan di form:", bookingTime);

  // Kirim data ke backend melalui AJAX
  fetch("main/submit", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      psychologist_id: psychologistId,
      booking_date: bookingDate,
      booking_time: bookingTime,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message); // Tampilkan pesan berhasil/gagal
      bookingModal.style.display = "none"; // Tutup modal
    })
    .catch((error) => console.error("Error:", error));
});

closeBookingModal.addEventListener("click", () => {
  bookingModal.style.display = "none";
});