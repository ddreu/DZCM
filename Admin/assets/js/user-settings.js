function previewLogo(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("profilePreview").src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

// Enable/Disable Editing
function toggleEdit(fieldId) {
  const field = document.getElementById(fieldId);
  field.disabled = !field.disabled;
  if (!field.disabled) {
    field.focus();
  }
}

// Enable Password Editing (Current + New + Confirm)
function enablePasswordEdit() {
  document.getElementById("oldPassword").disabled = false;
  document.getElementById("newPassword").disabled = false;
  document.getElementById("confirmPassword").disabled = false;
}

// Live Preview for Profile Picture
function previewLogo(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("profilePreview").src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

// Function to check password match
function checkPasswordMatch() {
  const newPassword = document.getElementById("newPassword");
  const confirmPassword = document.getElementById("confirmPassword");
  const message = document.getElementById("passwordMatchMessage");

  if (confirmPassword.value === "") {
    message.textContent = "";
    newPassword.style.borderColor = "#ced4da";
    confirmPassword.style.borderColor = "#ced4da";
    return;
  }

  if (newPassword.value === confirmPassword.value) {
    // message.textContent = "✅ Passwords match";
    message.textContent = "Passwords match";
    message.style.color = "green";
    newPassword.style.borderColor = "green";
    confirmPassword.style.borderColor = "green";
  } else {
    // message.textContent = "❌ Passwords do not match";
    message.textContent = "Passwords do not match";
    message.style.color = "red";
    newPassword.style.borderColor = "red";
    confirmPassword.style.borderColor = "red";
  }
}

// Handle validation on form submit
// document
//   .getElementById("userForm")
//   .addEventListener("submit", function (event) {
//     const newPassword = document.getElementById("newPassword").value;
//     const confirmPassword = document.getElementById("confirmPassword").value;

//     if (newPassword !== confirmPassword) {
//       alert("Passwords do not match!");
//       event.preventDefault();
//       return;
//     }

//     if (newPassword.length < 6) {
//       alert("Password must be at least 6 characters long.");
//       event.preventDefault();
//       return;
//     }
//   });

/* SUBMIT AJAX */

$(document).ready(function () {
  $("#userForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to save these changes?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, save it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "includes/handler.php?action=update_user_profile",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Success!",
                "User info saved successfully.",
                "success"
              ).then(() => {
                location.reload();
              });
            } else {
              Swal.fire("Error!", result.message, "error");
            }
          },
          error: function () {
            Swal.fire("Error!", "An error occurred while saving.", "error");
          },
        });
      }
    });
  });
});
