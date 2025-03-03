$(document).ready(function() {

    $('#addServiceForm').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: 'includes/handler.php?action=add_service',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    alert('Service added successfully');
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            },
            error: function() {
                alert('An error occurred while adding the service');
            }
        });
    });

    $('#addFeatureForm').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: 'includes/handler.php?action=add_service_feature',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    alert('Feature added successfully');
                    location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            },
            error: function() {
                alert('An error occurred while adding the feature');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let contextMenu = document.getElementById("contextMenu");

    document.querySelectorAll(".service-row").forEach(row => {
        row.addEventListener("click", function () {
            let serviceId = this.getAttribute("data-service-id");
            let serviceName = this.getAttribute("data-service-name");
            let description = this.getAttribute("data-description");
            let image = this.getAttribute("data-image");

            document.getElementById("editServiceId").value = serviceId;
            document.getElementById("editServiceName").value = serviceName;
            document.getElementById("editServiceDescription").value = description;

            let imagePreview = document.getElementById("editServiceImagePreview");
            if (image) {
                imagePreview.src = "includes/uploads/services/" + image;
                imagePreview.style.display = "block";
            } else {
                imagePreview.style.display = "none";
            }
        });

        row.addEventListener("contextmenu", function (event) {
            event.preventDefault();

            let serviceId = this.getAttribute("data-service-id");

            let addFeatureBtn = document.querySelector(".add-feature");
            let editServiceBtn = document.querySelector(".edit-service");
            let deleteServiceBtn = document.querySelector(".delete-service");

            if (addFeatureBtn) addFeatureBtn.setAttribute("data-service-id", serviceId);
            if (editServiceBtn) editServiceBtn.setAttribute("data-service-id", serviceId);
            if (deleteServiceBtn) deleteServiceBtn.setAttribute("data-service-id", serviceId);

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

    let editServiceBtn = document.querySelector(".edit-service");
    if (editServiceBtn) {
        editServiceBtn.addEventListener("click", function (event) {
            event.preventDefault();
            let serviceId = this.getAttribute("data-service-id");

            let targetRow = document.querySelector(`.service-row[data-service-id="${serviceId}"]`);
            if (targetRow) {
                targetRow.click();
            }

            new bootstrap.Modal(document.getElementById("editServiceModal")).show();
        });
    }

    let deleteServiceBtn = document.querySelector(".delete-service");
    if (deleteServiceBtn) {
        deleteServiceBtn.addEventListener("click", function (event) {
            event.preventDefault();
            let serviceId = this.getAttribute("data-service-id");
            let modal = document.getElementById("deleteServiceModal");
            if (modal) {
                let modalTarget = modal.querySelector("[data-service-id]");
                if (modalTarget) {
                    modalTarget.setAttribute("data-service-id", serviceId);
                }
                new bootstrap.Modal(modal).show();
            }
        });
    }
});

