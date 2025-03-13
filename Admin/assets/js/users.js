function previewImage(event) {
  const input = event.target;
  const preview = document.getElementById("imagePreview");

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  } else {
    preview.src = "";
    preview.style.display = "none";
  }
}

window.previewImage = previewImage;

function previewEditImage(event) {
  const input = event.target;
  const preview = document.getElementById("editUserProfilePreview");

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  } else {
    preview.src = "";
    preview.style.display = "none";
  }
}

/* DROPDOWN AND IT'S FUNCTONALITY */
document.addEventListener("DOMContentLoaded", function () {
  let contextMenu = document.getElementById("contextMenu");

  document.querySelectorAll(".user-row").forEach((row) => {
    row.addEventListener("click", function () {
      let userId = this.getAttribute("data-user-id");
      let userName = this.getAttribute("data-username");
      let image = this.getAttribute("data-image");

      document.getElementById("editUserId").value = userId;
      document.getElementById("editUserName").value = userName;

      let imagePreview = document.getElementById("editUserProfilePreview");
      if (image) {
        imagePreview.src = "includes/uploads/users/" + image;
        imagePreview.style.display = "block";
      } else {
        imagePreview.style.display = "none";
      }
    });

    row.addEventListener("contextmenu", function (event) {
      event.preventDefault();

      let userId = this.getAttribute("data-user-id");

      let editUserBtn = document.querySelector(".edit-user");
      let deleteUserBtn = document.querySelector(".delete-user");

      if (editUserBtn) editUserBtn.setAttribute("data-user-id", userId);
      if (deleteUserBtn) deleteUserBtn.setAttribute("data-user-id", userId);

      contextMenu.style.display = "block";
      contextMenu.style.left = `${event.pageX}px`;
      contextMenu.style.top = `${event.pageY}px`;
    });
  });

  document.addEventListener("click", function () {
    contextMenu.style.display = "none";
  });

  let editUserBtn = document.querySelector(".edit-user");
  if (editUserBtn) {
    editUserBtn.addEventListener("click", function (event) {
      event.preventDefault();
      let userId = this.getAttribute("data-user-id");

      let targetRow = document.querySelector(
        `.user-row[data-user-id="${userId}"]`
      );
      if (targetRow) {
        targetRow.click();
      }

      new bootstrap.Modal(document.getElementById("editUserModal")).show();
    });
  }

  /* DELETE USER */
  let deleteUserBtns = document.querySelectorAll(".delete-user");

  deleteUserBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
      event.preventDefault();
      let userId = this.getAttribute("data-user-id");

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          fetch("includes/handler.php?action=delete_user", {
            method: "POST",
            body: new URLSearchParams({ user_id: userId }),
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
          })
            .then((response) => response.json())
            .then((data) => {
              Swal.fire({
                title: data.status === "success" ? "Deleted!" : "Error!",
                text: data.message,
                icon: data.status === "success" ? "success" : "error",
              }).then(() => {
                if (data.status === "success") {
                  location.reload();
                }
              });
            })
            .catch((error) => {
              console.error("Error:", error);
              Swal.fire("Error!", "Something went wrong!", "error");
            });
        }
      });
    });
  });
});

$(document).ready(function () {
  $("#addUserForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to create this user?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "includes/handler.php?action=add_user",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Success!",
                "User created successfully.",
                "success"
              ).then(() => {
                location.reload();
              });
            } else {
              Swal.fire("Error!", result.message, "error");
            }
          },
          error: function () {
            Swal.fire(
              "Error!",
              "An error occurred while creating the user.",
              "error"
            );
          },
        });
      }
    });
  });
  $("#editUserForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to update this user?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, update it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "includes/handler.php?action=update_user",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Success!",
                "User updated successfully.",
                "success"
              ).then(() => {
                location.reload();
              });
            } else {
              Swal.fire("Error!", result.message, "error");
            }
          },
          error: function () {
            Swal.fire(
              "Error!",
              "An error occurred while updating the user.",
              "error"
            );
          },
        });
      }
    });
  });
});
