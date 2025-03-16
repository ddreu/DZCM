document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".nav-links a");

  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      navLinks.forEach((link) => link.classList.remove("active"));

      this.classList.add("active");
    });
  });
});

// function openModal() {
//     document.getElementById('quoteModal').style.display = 'flex';
// }

// function closeModal() {
//     document.getElementById('quoteModal').style.display = 'none';
// }

// window.onclick = function(event) {
//     const modal = document.getElementById('quoteModal');
//     if (event.target === modal) {
//         modal.style.display = 'none';
//     }
// }

// QUOTE MODAL

function openModal() {
  document.getElementById("modal").style.display = "flex";
  document.getElementById("modalOverlay").style.display = "block";
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
  document.getElementById("modalOverlay").style.display = "none";
}

// quote submit
document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll("form[id^='quoteForm']");

  forms.forEach((form) => {
    form.addEventListener("submit", async (event) => {
      event.preventDefault();

      const formData = new FormData(form);

      try {
        const response = await fetch("send-quote.php", {
          method: "POST",
          body: formData,
        });

        const result = await response.text();

        if (response.ok) {
          showNotificationModal("Success", result, true);
          form.reset();
          closeModal();
        } else {
          showNotificationModal("Error", `Error: ${result}`, false);
        }
      } catch (error) {
        showNotificationModal(
          "Error",
          `Failed to submit form: ${error.message}`,
          false
        );
      }
    });
  });
});

function closeModal() {
  const modal = document.getElementById("modal");
  if (modal) {
    modal.style.display = "none";
    document.getElementById("modalOverlay").style.display = "none";
  }
}

function showNotificationModal(title, message, isSuccess) {
  const notificationModal = document.getElementById("notificationModal");
  const notificationTitle = document.getElementById("notificationTitle");
  const notificationMessage = document.getElementById("notificationMessage");

  notificationTitle.textContent = title;
  notificationMessage.textContent = message;

  if (isSuccess) {
    notificationModal.classList.add("success");
    notificationModal.classList.remove("error");
  } else {
    notificationModal.classList.add("error");
    notificationModal.classList.remove("success");
  }

  notificationModal.style.display = "block";

  setTimeout(() => {
    notificationModal.style.display = "none";
  }, 3000);
}

// CAREER FORM

document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("send-career-application.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        document.getElementById("form-message").innerHTML =
          '<p style="color: green;">' + data.message + "</p>";
        document.getElementById("contactForm").reset();
      } else {
        document.getElementById("form-message").innerHTML =
          '<p style="color: red;">' + data.message + "</p>";
      }
    })
    .catch((error) => {
      document.getElementById("form-message").innerHTML =
        '<p style="color: red;">Something went wrong. Please try again!</p>';
    });
});

/* FILTER ON PORTFOLIO PAGE */

// document.addEventListener("DOMContentLoaded", () => {
//   const filterButtons = document.querySelectorAll(".filter-btn");
//   const serviceBoxes = document.querySelectorAll(".services-box");

//   // Add click event to each filter button
//   filterButtons.forEach((button) => {
//     button.addEventListener("click", () => {
//       // Remove 'active' class from all buttons and add to the clicked one
//       filterButtons.forEach((btn) => btn.classList.remove("active"));
//       button.classList.add("active");

//       const category = button.getAttribute("data-category");

//       // Filter services based on category
//       serviceBoxes.forEach((box) => {
//         if (
//           category === "all" ||
//           box.getAttribute("data-category") === category
//         ) {
//           box.style.display = "block";
//         } else {
//           box.style.display = "none";
//         }
//       });
//     });
//   });

//   // Auto-select the "All" button on load
//   document.querySelector('.filter-btn[data-category="all"]').click();
// });
