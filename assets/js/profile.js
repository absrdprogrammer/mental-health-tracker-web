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
    // Get the input values
    const name = document.getElementById("nameInput").value;
    const email = document.getElementById("emailInput").value;
    const role = document.getElementById("roleInput").value;
    const profileImgSrc = document.getElementById("imagePreview").src;
  
    // Validate inputs
    if (!name || !email || !role) {
      alert("Please fill out all fields.");
      return;
    }
  
    // Save the data to localStorage (or send to server in a real app)
    localStorage.setItem("profileName", name);
    localStorage.setItem("profileEmail", email);
    localStorage.setItem("profileRole", role);
    localStorage.setItem("profileImage", profileImgSrc);
  
    // Redirect to the main profile page (or reload)
    window.location.href = "index.html";
  });
  