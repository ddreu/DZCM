document.addEventListener("DOMContentLoaded", function () {
    const portfolioItems = document.querySelectorAll(".featured-box");

  
    portfolioItems.forEach(item => {
        item.style.display = "block";  
    });
});
