window.addEventListener("load", function () {
  const counters = document.querySelectorAll(".counter");

  function startCount(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        console.log("Element is intersecting");

        counters.forEach((counter) => {
          if (counter.getAttribute("data-started") === "true") return;

          const target = +counter.getAttribute("data-target");
          console.log(`Target value: ${target}`);
          let current = target <= 20 ? 100 : 0;
          const duration = 1000;
          counter.setAttribute("data-started", "true");

          if (target <= 20) {
            const interval = 40;
            const steps = Math.floor(duration / interval);

            let count = 0;
            const timer = setInterval(() => {
              count++;
              current -= Math.max(1, Math.floor(Math.random() * 5));
              if (current < target) current = target;

              counter.textContent = current;

              if (count >= steps || current <= target) {
                clearInterval(timer);
                counter.textContent = target;
              }
            }, interval);
          } else {
            const increment = target / (duration / 16);

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
          }
        });

        observer.unobserve(entry.target);
      }
    });
  }

  const observer = new IntersectionObserver(startCount, {
    threshold: 0.1,
  });

  const target = document.querySelector(".success-numbers");
  if (target) {
    console.log("Target element found");
    observer.observe(target);
  } else {
    console.log("Target element NOT found");
  }
});
