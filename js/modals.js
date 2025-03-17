let currentIndex = 0;

function nextSlide() {
  const carousel = document.querySelector(".carousel");
  const items = document.querySelectorAll(".carousel-item");
  currentIndex = (currentIndex + 1) % items.length;
  updateCarousel();
}

function prevSlide() {
  const carousel = document.querySelector(".carousel");
  const items = document.querySelectorAll(".carousel-item");
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  updateCarousel();
}

function updateCarousel() {
  const carousel = document.querySelector(".carousel");
  const offset = -currentIndex * 100;
  carousel.style.transform = `translateX(${offset}%)`;
}

function openServiceModal() {
  document.getElementById("serviceModal").style.display = "flex";
  document.body.style.overflow = "hidden";
}

function closeServiceModal() {
  document.getElementById("serviceModal").style.display = "none";
  document.body.style.overflow = "auto";
}

// SERVICES MODAL //

document.addEventListener("DOMContentLoaded", () => {
  const discoverButtons = document.querySelectorAll(".discover-btn");

  discoverButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();
      const serviceId = button.getAttribute("data-id");

      fetch(`includes/fetch/get_services.php?id=${serviceId}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            document.getElementById("serviceName").textContent =
              data.service.service_name;
            document.getElementById("serviceDescription").innerHTML =
              data.service.description;

            document.getElementById("carousel").innerHTML = "";
            document.getElementById("featuresList").innerHTML = "";

            if (data.service.image) {
              const mainImage = document.createElement("div");
              mainImage.classList.add("carousel-item");
              mainImage.innerHTML = `<img src="admin/includes/uploads/services/${data.service.image}" alt="Service Image">`;
              document.getElementById("carousel").appendChild(mainImage);
            }

            data.features.forEach((feature) => {
              if (feature.image) {
                const featureImage = document.createElement("div");
                featureImage.classList.add("carousel-item");
                featureImage.innerHTML = `<img src="admin/includes/uploads/service-feature/${feature.image}" alt="${feature.name}">`;
                document.getElementById("carousel").appendChild(featureImage);
              }
              const featureItem = document.createElement("li");
              featureItem.innerHTML = `
                            <h4>${feature.name}</h4>
                            <p>${feature.description}</p>
                        `;
              document.getElementById("featuresList").appendChild(featureItem);
            });

            document.getElementById("serviceModal").style.display = "flex";
          } else {
            alert("Failed to load service details.");
          }
        })
        .catch((error) => console.error("Error:", error));
    });
  });
});

function closeServiceModal() {
  document.getElementById("serviceModal").style.display = "none";
}

// HARDWARE MODAL //

// GET A QUOTE MODAL //

document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".nav-links a");

  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      navLinks.forEach((link) => link.classList.remove("active"));

      this.classList.add("active");
    });
  });
});

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
        const response = await fetch("includes/email-process/send-quote.php", {
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

  fetch("includes/email-process/send-career-application.php", {
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
