$(document).ready(function() {

    $('#addServiceForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this); 
    
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to add this service?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, add it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'includes/handler.php?action=add_service',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            Swal.fire("Success!", "Service added successfully.", "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error!", result.message, "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "An error occurred while adding the service.", "error");
                    }
                });
            }
        });
});

    $('#editServiceForm').submit(function (e) {
        e.preventDefault(); 
    
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to update this service?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(document.getElementById('editServiceForm'));
                formData.append('service_id', $('#editServiceId').val());
    
                $.ajax({
                    url: 'includes/handler.php?action=edit_service',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            Swal.fire("Updated!", "Service updated successfully.", "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error!", result.message, "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "An error occurred while updating the service.", "error");
                    }
                });
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

/* DROPDOWN */
 
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


    /* DELETE SERVICE */
        let deleteServiceBtns = document.querySelectorAll(".delete-service");
    
        deleteServiceBtns.forEach((btn) => {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                let serviceId = this.getAttribute("data-service-id");
    
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch("includes/handler.php?action=delete_service", {
                            method: "POST",
                            body: new URLSearchParams({ service_id: serviceId }),
                            headers: { "Content-Type": "application/x-www-form-urlencoded" }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                title: data.status === "success" ? "Deleted!" : "Error!",
                                text: data.message,
                                icon: data.status === "success" ? "success" : "error"
                            }).then(() => {
                                if (data.status === "success") {
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            Swal.fire("Error!", "Something went wrong!", "error");
                        });
                    }
                });
            });
        });
    });
    


