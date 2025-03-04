
/*  */


/* SUBMITS  (ADD, EDIT) */

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

        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to add this feature?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, add it!"
        }).then((result) => {
            if (result.isConfirmed) {
                
        
        $.ajax({
            url: 'includes/handler.php?action=add_service_feature',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    Swal.fire("Sucess!", "Feature added successfully", "success").then(()=>{
                        location.reload();
                    });
                } else {
                    Swal.fire("Error!" + result.message, "error");
                }
            },
            error: function() {
                Swal.fire("Error!", "An error occurred while adding the feature.", "error");
            }
        });
            }
        });
    });

    $('#editFeatureForm').submit(function (e) {
        e.preventDefault(); 
    
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to update this feature?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(document.getElementById('editFeatureForm'));
                formData.append('service_feature_id', $('#editServiceFeatureId').val());
    
                $.ajax({
                    url: 'includes/handler.php?action=edit_service_feature',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            Swal.fire("Updated!", "Feature updated successfully.", "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error!", result.message, "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "An error occurred while updating the feature.", "error");
                    }
                });
            }
        });
    });

    $('#addClientForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this); 
    
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to add this Client?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, add it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'includes/handler.php?action=add_client',
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

    $('#editClientForm').submit(function (e) {
        e.preventDefault(); 
    
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to update this client?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(document.getElementById('editClientForm'));
                formData.append('client_id', $('#editClientId').val());
    
                $.ajax({
                    url: 'includes/handler.php?action=edit_client',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            Swal.fire("Updated!", "Feature updated successfully.", "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error!", result.message, "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "An error occurred while updating the feature.", "error");
                    }
                });
            }
        });
    });
 
});

/* DROPDOWN SERVICES TABLE */
 
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
    

    /* DROPDOWN SERVICE FEATURES TABLE */
 
document.addEventListener("DOMContentLoaded", function () {
    let contextMenu = document.getElementById("contextMenu");

    document.querySelectorAll(".service-feature-row").forEach(row => {
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
            if (editServiceBtn) editServiceBtn.setAttribute("data-service-feature-id", featureId);
            if (deleteServiceBtn) deleteServiceBtn.setAttribute("data-service-feature-id", featureId);

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


            let targetRow = document.querySelector(`.service-row[data-service-id="${serviceId}"]`);
            if (targetRow) {
                targetRow.click();
            }

            new bootstrap.Modal(document.getElementById("editServiceFeatureModal")).show();
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
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch("includes/handler.php?action=delete_service_feature", {
                            method: "POST",
                            body: new URLSearchParams({ service_feature_id: servicefeatureId }),
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

    /* DROPDOWN CLIENTS TABLE */

    document.addEventListener("DOMContentLoaded", function () {
        let contextMenu = document.getElementById("contextMenu");
    
        document.querySelectorAll(".clients-row").forEach(row => {
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
                if (deleteClientBtn) deleteClientBtn.setAttribute("data-client-id", clientId);
    
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
    
    
                let targetRow = document.querySelector(`.clients-row[data-client-id="${clientId}"]`);
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
                     confirmButtonText: "Yes, delete it!"
                 }).then((result) => {
                     if (result.isConfirmed) {
                         fetch("includes/handler.php?action=delete_client", {
                             method: "POST",
                             body: new URLSearchParams({ client_id: clientId }),
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







