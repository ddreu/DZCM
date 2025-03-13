 /* HARDWARE  */
 $(document).ready(function() {
 $('#addHardwareForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this); 

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to add this hardware?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, add it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'includes/handler.php?action=add_hardware',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire("Success!", "Hardware added successfully.", "success").then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Error!", result.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error!", "An error occurred while adding the hardware.", "error");
                }
            });
        }
    });
});

$('#editHardwareForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this); 

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to update this hardware?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, add it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'includes/handler.php?action=update_hardware',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire("Success!", "Hardware updated successfully.", "success").then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Error!", result.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error!", "An error occurred while updating the hardware.", "error");
                }
            });
        }
    });
});
 });

 /*  DROPDOWN  */

 document.addEventListener("DOMContentLoaded", function () {
    let contextMenu = document.getElementById("contextMenu");

    document.querySelectorAll(".hardware-row").forEach(row => {
        row.addEventListener("click", function () {
            let hardwareId = this.getAttribute("data-hardware-id");
            let hardwareName = this.getAttribute("data-hardware-name");
            let description = this.getAttribute("data-hardware-description");
            let image = this.getAttribute("data-image");

            document.getElementById("editHardwareId").value = hardwareId;
            document.getElementById("editHardwareName").value = hardwareName;
            document.getElementById("editHardwareDescription").value = description;

            let imagePreview = document.getElementById("editHardwareImagePreview");
            if (image) {
                imagePreview.src = "includes/uploads/hardware/" + image;
                imagePreview.style.display = "block";
            } else {
                imagePreview.style.display = "none";
            }
        });


        row.addEventListener("contextmenu", function (event) {
            event.preventDefault();

            let hardwareId = this.getAttribute("data-hardware-id");

            // let addFeatureBtn = document.querySelector(".add-feature");
            let editServiceBtn = document.querySelector(".edit-hardware");
            let deleteServiceBtn = document.querySelector(".delete-hardware");

            // if (addFeatureBtn) addFeatureBtn.setAttribute("data-service-id", serviceId);
            if (editServiceBtn) editServiceBtn.setAttribute("data-hardware-id", hardwareId);
            if (deleteServiceBtn) deleteServiceBtn.setAttribute("data-hardware-id", hardwareId);

            contextMenu.style.display = "block";
            contextMenu.style.left = `${event.pageX}px`;
            contextMenu.style.top = `${event.pageY}px`;
        });
    });

    document.addEventListener("click", function () {
        contextMenu.style.display = "none";
    });

    // let addHardwareBtn = document.querySelector(".add-hardware");
    // if (addHardwareBtn) {
    //     addHardwareBtn.addEventListener("click", function (event) {
    //         event.preventDefault();
    //         let hardwareId = this.getAttribute("data-hardware-id");
    //         document.getElementById("featureServiceId").value = serviceId;
    //         new bootstrap.Modal(document.getElementById("addFeatureModal")).show();
    //     });
    // } 

    let editHardwareBtn = document.querySelector(".edit-hardware");
    if (editHardwareBtn) {
        editHardwareBtn.addEventListener("click", function (event) {
            event.preventDefault();
            let hardwareId = this.getAttribute("data-hardware-id");

            let targetRow = document.querySelector(`.hardware-row[data-hardware-id="${hardwareId}"]`);
            if (targetRow) {
                targetRow.click();
            }

            new bootstrap.Modal(document.getElementById("editHardwareModal")).show();
        });
    }


         /* DELETE HARDWARE */
        let deleteHardwareBtns = document.querySelectorAll(".delete-hardware");
    
        deleteHardwareBtns.forEach((btn) => {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                let hardwareId = this.getAttribute("data-hardware-id");
    
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
                        fetch("includes/handler.php?action=delete_hardware", {
                            method: "POST",
                            body: new URLSearchParams({ hardware_id: hardwareId }),
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
    