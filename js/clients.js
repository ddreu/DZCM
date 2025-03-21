document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const serviceBoxes = document.querySelectorAll(".clients-box");

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      const category = button.getAttribute("data-category");

      serviceBoxes.forEach((box) => {
        if (
          category === "all" ||
          box.getAttribute("data-category") === category
        ) {
          box.style.display = "block";
        } else {
          box.style.display = "none";
        }
      });
    });
  });

  document.querySelector('.filter-btn[data-category="all"]').click();
});

document.addEventListener("DOMContentLoaded", () => {
  const carouselElement = document.querySelector("#clientsCarousel");
  if (carouselElement) {
    new bootstrap.Carousel(carouselElement, {
      interval: 3000,
      ride: "carousel",
    });
  }
});

// document.addEventListener("DOMContentLoaded", () => {
//   const carousel = new bootstrap.Carousel("#clientsCarousel", {
//     interval: 3000,
//     ride: "carousel",
//   });
// });

// document.addEventListener("DOMContentLoaded", () => {
//   const clientsCarousel = new bootstrap.Carousel(
//     document.getElementById("clientsCarousel"),
//     {
//       interval: 3000,
//       wrap: true,
//       pause: "hover",
//     }
//   );
// });
