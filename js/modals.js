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

/* SERVICE MODAL */
document.addEventListener("DOMContentLoaded", () => {
  const discoverButtons = document.querySelectorAll(
    '.discover-btn[data-type="service"]'
  );

  discoverButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();
      const serviceId = button.getAttribute("data-id");

      fetch(`includes/fetch/get_service-features.php?id=${serviceId}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            document.getElementById("serviceName").textContent =
              data.service.service_name;
            document.getElementById("serviceDescription").innerHTML =
              data.service.description;

            const carousel = document.getElementById("carousel");
            carousel.innerHTML = "";

            let mainImageUrl = "";
            if (data.service.image) {
              mainImageUrl = `admin/includes/uploads/services/${data.service.image}`;
              const mainImage = document.createElement("div");
              mainImage.classList.add("service-carousel-main");
              mainImage.innerHTML = `<img src="${mainImageUrl}" alt="Service Image">`;
              carousel.appendChild(mainImage);
            }

            if (data.features && data.features.length > 0) {
              const featureContainer = document.createElement("div");
              featureContainer.classList.add("service-carousel-features");

              if (mainImageUrl) {
                const mainFeatureImage = document.createElement("div");
                mainFeatureImage.classList.add("service-carousel-item");
                mainFeatureImage.innerHTML = `
                  <img src="${mainImageUrl}" alt="Main Image">
                `;
                mainFeatureImage.addEventListener("click", () => {
                  document.querySelector(".service-carousel-main img").src =
                    mainImageUrl;
                });
                featureContainer.appendChild(mainFeatureImage);
              }

              data.features.forEach((feature) => {
                if (feature.image) {
                  const featureImage = document.createElement("div");
                  featureImage.classList.add("service-carousel-item");
                  featureImage.innerHTML = `
                    <img src="admin/includes/uploads/service-features/${feature.image}" alt="${feature.name}">
                  `;

                  featureImage.addEventListener("click", () => {
                    document.querySelector(
                      ".service-carousel-main img"
                    ).src = `admin/includes/uploads/service-features/${feature.image}`;
                  });

                  featureContainer.appendChild(featureImage);
                }
              });

              carousel.appendChild(featureContainer);

              let isDown = false;
              let startX;
              let scrollLeft;

              featureContainer.addEventListener("mousedown", (e) => {
                isDown = true;
                featureContainer.classList.add("active");
                startX = e.pageX - featureContainer.offsetLeft;
                scrollLeft = featureContainer.scrollLeft;
              });

              featureContainer.addEventListener("mouseleave", () => {
                isDown = false;
                featureContainer.classList.remove("active");
              });

              featureContainer.addEventListener("mouseup", () => {
                isDown = false;
                featureContainer.classList.remove("active");
              });

              featureContainer.addEventListener("mousemove", (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - featureContainer.offsetLeft;
                const walk = (x - startX) * 2;
                featureContainer.scrollLeft = scrollLeft - walk;
              });

              featureContainer.addEventListener("wheel", (e) => {
                e.preventDefault();
                featureContainer.scrollLeft += e.deltaY;
              });
            }

            const featuresList = document.getElementById("featuresList");
            featuresList.innerHTML = "";

            data.features.forEach((feature) => {
              const featureItem = document.createElement("li");
              featureItem.innerHTML = `
                <h4>${feature.name}</h4>
                <p>${feature.description}</p>
              `;
              featuresList.appendChild(featureItem);
            });

            document.getElementById("serviceModal").style.display = "flex";
            document.body.style.overflow = "hidden";
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
  document.body.style.overflow = "";
}

/* horizontal scroll on services modal */

// document.addEventListener("DOMContentLoaded", () => {
//   const carousel = document.querySelector(".service-carousel-features");

//   if (carousel) {
//     let isDown = false;
//     let startX;
//     let scrollLeft;

//     carousel.addEventListener("mousedown", (e) => {
//       isDown = true;
//       carousel.classList.add("active");
//       startX = e.pageX - carousel.offsetLeft;
//       scrollLeft = carousel.scrollLeft;
//     });

//     carousel.addEventListener("mouseleave", () => {
//       isDown = false;
//       carousel.classList.remove("active");
//     });

//     carousel.addEventListener("mouseup", () => {
//       isDown = false;
//       carousel.classList.remove("active");
//     });

//     carousel.addEventListener("mousemove", (e) => {
//       if (!isDown) return;
//       e.preventDefault();
//       const x = e.pageX - carousel.offsetLeft;
//       const walk = (x - startX) * 2;
//       carousel.scrollLeft = scrollLeft - walk;
//     });
//   }
// });

// HARDWARE MODAL //

document.addEventListener("DOMContentLoaded", () => {
  const discoverBtns = document.querySelectorAll(
    '.hardware-btn[data-type="hardware"]'
  );
  const hardwareModal = document.getElementById("hardwareModal");
  const hardwareName = document.getElementById("hardwareName");
  const hardwareDescription = document.getElementById("hardwareDescription");
  const hardwareImage = document.getElementById("hardwareImage");

  discoverBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      const name = btn.getAttribute("data-name");
      const description = btn.getAttribute("data-description");
      const image = btn.getAttribute("data-image");

      hardwareName.textContent = name;
      hardwareDescription.textContent = description;
      hardwareImage.src = image;
      hardwareImage.style.display = "block";

      hardwareModal.style.display = "flex";
    });
  });

  window.closeHardwareModal = () => {
    hardwareModal.style.display = "none";
    hardwareImage.style.display = "none";
  };

  window.addEventListener("click", (e) => {
    if (e.target === hardwareModal) {
      closeHardwareModal();
    }
  });
});

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
