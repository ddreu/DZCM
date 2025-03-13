$(document).ready(function () {
  $("#addClientForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to add this Client?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "includes/handler.php?action=add_client",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Success!",
                "Service added successfully.",
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
              "An error occurred while adding the service.",
              "error"
            );
          },
        });
      }
    });
  });

  $("#editClientForm").submit(function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to update this client?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, update it!",
    }).then((result) => {
      if (result.isConfirmed) {
        const formData = new FormData(
          document.getElementById("editClientForm")
        );
        formData.append("client_id", $("#editClientId").val());

        $.ajax({
          url: "includes/handler.php?action=edit_client",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Updated!",
                "Feature updated successfully.",
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
              "An error occurred while updating the feature.",
              "error"
            );
          },
        });
      }
    });
  });
});

/* DROPDOWN CLIENTS TABLE */
document.addEventListener("DOMContentLoaded", function () {
  let contextMenu = document.getElementById("contextMenu");

  document.querySelectorAll(".clients-row").forEach((row) => {
    row.addEventListener("click", function () {
      let clientId = this.getAttribute("data-client-id");
      let serviceId = this.getAttribute("data-service-id");
      let clientName = this.getAttribute("data-client-name");
      let description = this.getAttribute("data-description");
      let image = this.getAttribute("data-image");

      document.getElementById("editClientId").value = clientId;
      document.getElementById("editClientName").value = clientName;
      document.getElementById("editClientDescription").value = description;
      document.getElementById("editClientServiceId").value = serviceId;

      let imagePreview = document.getElementById("editClientImagePreview");
      if (image) {
        imagePreview.src = "includes/uploads/clients/" + image;
        imagePreview.style.display = "block";
      } else {
        imagePreview.style.display = "none";
      }
    });

    row.addEventListener("contextmenu", function (event) {
      event.preventDefault();

      let clientId = this.getAttribute("data-client-id");

      let editClientBtn = document.querySelector(".edit-client");
      let deleteClientBtn = document.querySelector(".delete-client");

      if (editClientBtn) editClientBtn.setAttribute("data-client-id", clientId);
      if (deleteClientBtn)
        deleteClientBtn.setAttribute("data-client-id", clientId);

      contextMenu.style.display = "block";
      contextMenu.style.left = `${event.pageX}px`;
      contextMenu.style.top = `${event.pageY}px`;
    });
  });

  document.addEventListener("click", function () {
    contextMenu.style.display = "none";
  });

  let addFeatureBtn = document.querySelector(".add-feature");
  if (addFeatureBtn) {
    addFeatureBtn.addEventListener("click", function (event) {
      event.preventDefault();
      let serviceId = this.getAttribute("data-service-id");
      document.getElementById("featureServiceId").value = serviceId;
      new bootstrap.Modal(document.getElementById("addFeatureModal")).show();
    });
  }

  let editServiceFeatureBtn = document.querySelector(".edit-client");
  if (editServiceFeatureBtn) {
    editServiceFeatureBtn.addEventListener("click", function (event) {
      event.preventDefault();
      let clientId = this.getAttribute("data-client-id");

      let targetRow = document.querySelector(
        `.clients-row[data-client-id="${clientId}"]`
      );
      if (targetRow) {
        targetRow.click();
      }

      new bootstrap.Modal(document.getElementById("editClientModal")).show();
    });
  }

  /* DELETE CLIENT */

  let deleteClientBtns = document.querySelectorAll(".delete-client");

  deleteClientBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
      event.preventDefault();
      let clientId = this.getAttribute("data-client-id");

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
          fetch("includes/handler.php?action=delete_client", {
            method: "POST",
            body: new URLSearchParams({ client_id: clientId }),
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
