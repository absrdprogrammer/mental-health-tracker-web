<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>" />
</head>

<body>
  <div class="edit-profile-container">
    <h2>Edit Profile</h2>
    <form id="editProfileForm">
      <!-- Image Preview Above -->
      <div class="form-group">
        <div class="image-preview">
          <img id="imagePreview" src="<?php echo base_url('assets/img/gr.png'); ?>" alt="Profile Preview" />
        </div>
        <label for="profileImgInput">Profile Picture:</label>
        <input type="file" id="profileImgInput" accept="image/*" />
      </div>

      <!-- Edit Name -->
      <div class="form-group">
        <label for="nameInput">Name:</label>
        <input type="text" id="nameInput" placeholder="Enter your name" />
      </div>

      <!-- Edit Email -->
      <div class="form-group">
        <label for="emailInput">Email:</label>
        <input type="email" id="emailInput" placeholder="Enter your email" />
      </div>

      <!-- Edit Role -->
      <div class="form-group">
        <label for="roleInput">Role:</label>
        <input type="text" id="roleInput" placeholder="Enter your role" />
      </div>

      <!-- Submit Button -->
      <button type="button" id="saveButton">Save Changes</button>
    </form>
  </div>

  <script src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
</body>

</html>