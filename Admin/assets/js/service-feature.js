$(document).ready(function () {
  $("#addFeatureForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to add this feature?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "includes/handler.php?action=add_service_feature",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Sucess!",
                "Feature added successfully",
                "success"
              ).then(() => {
                location.reload();
              });
            } else {
              Swal.fire("Error!" + result.message, "error");
            }
          },
          error: function () {
            Swal.fire(
              "Error!",
              "An error occurred while adding the feature.",
              "error"
            );
          },
        });
      }
    });
  });

  $("#editFeatureForm").submit(function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to update this feature?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, update it!",
    }).then((result) => {
      if (result.isConfirmed) {
        const formData = new FormData(
          document.getElementById("editFeatureForm")
        );
        formData.append("service_feature_id", $("#editServiceFeatureId").val());

        $.ajax({
          url: "includes/handler.php?action=edit_service_feature",
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

/* DROPDOWN */

document.addEventListener("DOMContentLoaded", function () {
  let contextMenu = document.getElementById("contextMenu");

  document.querySelectorAll(".service-feature-row").forEach((row) => {
    row.addEventListener("click", function () {
      let featureId = this.getAttribute("data-service-feature-id");
      let serviceId = this.getAttribute("data-service-id");
      let featureName = this.getAttribute("data-feature-name");
      let description = this.getAttribute("data-description");
      let image = this.getAttribute("data-image");

      document.getElementById("editServiceFeatureId").value = featureId;
      document.getElementById("editServiceId").value = serviceId;
      document.getElementById("editFeatureName").value = featureName;
      document.getElementById("editFeatureDescription").value = description;

      let imagePreview = document.getElementById("editFeatureImagePreview");
      if (image) {
        imagePreview.src = "includes/uploads/service-features/" + image;
        imagePreview.style.display = "block";
      } else {
        imagePreview.style.display = "none";
      }
    });

    row.addEventListener("contextmenu", function (event) {
      event.preventDefault();

      let featureId = this.getAttribute("data-service-feature-id");

      /* let addFeatureBtn = document.querySelector(".add-feature"); */
      let editServiceBtn = document.querySelector(".edit-feature");
      let deleteServiceBtn = document.querySelector(".delete-feature");

      /* if (addFeatureBtn) addFeatureBtn.setAttribute("data-service-feature-id", serviceId); */
      if (editServiceBtn)
        editServiceBtn.setAttribute("data-service-feature-id", featureId);
      if (deleteServiceBtn)
        deleteServiceBtn.setAttribute("data-service-feature-id", featureId);

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

  let editServiceFeatureBtn = document.querySelector(".edit-feature");
  if (editServiceFeatureBtn) {
    editServiceFeatureBtn.addEventListener("click", function (event) {
      event.preventDefault();
      let serviceId = this.getAttribute("data-service-id");
      //let serviceFeatureId = this.getAttribute("data-service-feature-id");

      let targetRow = document.querySelector(
        `.service-row[data-service-id="${serviceId}"]`
      );
      if (targetRow) {
        targetRow.click();
      }

      new bootstrap.Modal(
        document.getElementById("editServiceFeatureModal")
      ).show();
    });
  }

  /* DELETE FEATURE */
  let deleteServiceFeatureBtns = document.querySelectorAll(".delete-feature");

  deleteServiceFeatureBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
      event.preventDefault();
      let servicefeatureId = this.getAttribute("data-service-feature-id");

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
          fetch("includes/handler.php?action=delete_service_feature", {
            method: "POST",
            body: new URLSearchParams({ service_feature_id: servicefeatureId }),
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
