let slideIndex = 0;
let slides = document.getElementsByClassName("mySlides");
const dotsContainer = document.querySelector(".dots-container");

for (let i = 0; i < slides.length; i++) {
  const dot = document.createElement("div");
  dot.className = "dot";
  dot.addEventListener("click", () => {
    slideIndex = i;
    showSlides();
  });
  dotsContainer.appendChild(dot);
}

function showSlides() {
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
    document.querySelectorAll(".dot")[i].classList.remove("active");
  }

  if (slideIndex >= slides.length) slideIndex = 0;
  if (slideIndex < 0) slideIndex = slides.length - 1;

  slides[slideIndex].classList.add("active");
  document.querySelectorAll(".dot")[slideIndex].classList.add("active");
}

document.querySelector(".prev").addEventListener("click", () => {
  slideIndex--;
  showSlides();
});

document.querySelector(".next").addEventListener("click", () => {
  slideIndex++;
  showSlides();
});

function autoAdvance() {
  slideIndex++;
  showSlides();
}

showSlides();

let slideTimer = setInterval(autoAdvance, 5000);

document
  .querySelector(".slideshow-container")
  .addEventListener("mouseenter", () => {
    clearInterval(slideTimer);
  });

document
  .querySelector(".slideshow-container")
  .addEventListener("mouseleave", () => {
    slideTimer = setInterval(autoAdvance, 4000);
  });
