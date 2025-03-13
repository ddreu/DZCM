$(document).ready(function () {
  $("#companyForm").submit(function (e) {
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
          url: "includes/handler.php?action=company_info",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            const result = JSON.parse(response);
            if (result.status === "success") {
              Swal.fire(
                "Success!",
                "Company info saved successfully.",
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

/* PREVIEW IMAGE */
function previewLogo(event) {
  const file = event.target.files[0];
  if (file) {
    const imgElement = document.querySelector('img[alt="Company Logo"]');

    const reader = new FileReader();
    reader.onload = function (e) {
      imgElement.src = e.target.result;
      imgElement.onload = () => {
        imgElement.style.objectFit = "contain";
      };
    };
    reader.readAsDataURL(file);
  }
}
