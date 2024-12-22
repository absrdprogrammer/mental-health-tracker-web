// Toggle the profile dropdown
document.getElementById("profile-btn").addEventListener("click", function () {
  const dropdown = document.getElementById("profile-dropdown");
  dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

// Close dropdown when clicking outside
window.addEventListener("click", function (event) {
  const dropdown = document.getElementById("profile-dropdown");
  const profileBtn = document.getElementById("profile-btn");
  if (!profileBtn.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.style.display = "none";
  }
});

// Preview the image when a new file is selected
document.getElementById("profileImgInput").addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("imagePreview").src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
});

// Save the changes and redirect back to the main profile
document.getElementById("saveButton").addEventListener("click", function () {
  const name = document.getElementById("nameInput").value;
  const email = document.getElementById("emailInput").value;
  const role = document.getElementById("roleInput").value;
  const profileImgSrc = document.getElementById("imagePreview").src;

  if (!name || !email || !role) {
    alert("Please fill out all fields.");
    return;
  }

  localStorage.setItem("profileName", name);
  localStorage.setItem("profileEmail", email);
  localStorage.setItem("profileRole", role);
  localStorage.setItem("profileImage", profileImgSrc);

  // Redirect to the main profile page (or reload)
  window.location.href = "main.php";
});
