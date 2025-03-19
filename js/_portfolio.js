document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const servicesContainer = document.getElementById("servicesContainer");

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      const category = button.getAttribute("data-category");

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "includes/fetch/fetch_services.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = () => {
        if (xhr.status === 200) {
          servicesContainer.innerHTML = xhr.responseText;
        }
      };

      xhr.send(`filter_category=${encodeURIComponent(category)}`);
    });
  });

  document.querySelector('.filter-btn[data-category="all"]').click();
});
