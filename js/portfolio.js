document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const serviceBoxes = document.querySelectorAll(".services-box");

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
