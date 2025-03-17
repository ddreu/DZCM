document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".counter");
  let started = false;

  function startCount(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting && !started) {
        started = true;
        counters.forEach((counter) => {
          const target = +counter.getAttribute("data-target");
          const duration = 2000;
          const increment = target / (duration / 16);
          let current = 0;

          const updateCounter = () => {
            current += increment;
            if (current < target) {
              counter.textContent = Math.ceil(current);
              requestAnimationFrame(updateCounter);
            } else {
              counter.textContent = target;
            }
          };

          updateCounter();
        });
        observer.unobserve(entry.target);
      }
    });
  }

  const observer = new IntersectionObserver(startCount, {
    threshold: 0.3,
  });

  observer.observe(document.querySelector(".success-numbers"));
});
