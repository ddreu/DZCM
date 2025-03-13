// /* LOGOUT */

// document
//   .getElementById("logout-link")
//   .addEventListener("click", function (event) {
//     event.preventDefault();

//     Swal.fire({
//       title: "Are you sure?",
//       text: "You will be logged out of your account.",
//       icon: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "#3085d6",
//       cancelButtonColor: "#d33",
//       confirmButtonText: "Yes, logout!",
//     }).then((result) => {
//       if (result.isConfirmed) {
//         Swal.fire({
//           title: "Logging out...",
//           text: "Please wait a moment.",
//           allowOutsideClick: false,
//           allowEscapeKey: false,
//           allowEnterKey: false,
//           didOpen: () => {
//             Swal.showLoading();
//           },
//         });

//         setTimeout(() => {
//           window.location.href = "includes/handler.php?action=logout";
//         }, 700);
//       }
//     });
//   });

// /* DASHBOARD */
// document.addEventListener("DOMContentLoaded", function () {
//   let activeField = null;

//   window.toggleEdit = function (fieldId, buttonId) {
//     const field = document.getElementById(fieldId);
//     const button = document.getElementById(buttonId);

//     if (!field || !button) {
//       console.error("Element not found:", fieldId, buttonId);
//       return;
//     }

//     if (field.disabled) {
//       field.disabled = false;
//       button.textContent = "Save";
//       button.classList.replace("btn-primary", "btn-success");

//       activeField = { field, button };
//     } else {
//       updateCompanyInfo(fieldId, field.value, button);
//     }
//   };

//   function updateCompanyInfo(fieldId, fieldValue) {
//     fetch("includes/handler.php?action=company_info", {
//       method: "POST",
//       headers: { "Content-Type": "application/x-www-form-urlencoded" },
//       body: `field=${fieldId}&value=${encodeURIComponent(fieldValue)}`,
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         if (data.status === "success") {
//           activeField.field.disabled = true;
//           activeField.button.textContent = "Edit";
//           activeField.button.classList.replace("btn-success", "btn-primary");
//           activeField = null;

//           Swal.fire({
//             icon: "success",
//             title: "Success!",
//             text: "Company information updated!",
//             toast: true,
//             position: "top-end",
//             showConfirmButton: false,
//             timer: 2000,
//           });
//         } else {
//           Swal.fire({
//             icon: "error",
//             title: "Error!",
//             text: data.message,
//             toast: true,
//             position: "top-end",
//             showConfirmButton: false,
//             timer: 2000,
//           });
//         }
//       })
//       .catch((error) => {
//         console.error("Error:", error);
//         Swal.fire({
//           icon: "error",
//           title: "Oops...",
//           text: "An unexpected error occurred!",
//           toast: true,
//           position: "top-end",
//           showConfirmButton: false,
//           timer: 2000,
//         });
//       });
//   }

//   document.addEventListener("click", function (event) {
//     if (
//       activeField &&
//       !activeField.field.contains(event.target) &&
//       !activeField.button.contains(event.target)
//     ) {
//       activeField.field.disabled = true;
//       activeField.button.textContent = "Edit";
//       activeField.button.classList.replace("btn-success", "btn-primary");
//       activeField = null;
//     }
//   });
// });
