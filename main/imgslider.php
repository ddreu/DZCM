<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .slideshow-container {
        position: relative;
        width: 100%;
        height: 80vh;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .mySlides {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .mySlides.active {
        opacity: 1;
    }

    .slide-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .caption {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        font-size: 3.5rem;
        font-weight: 700;
        text-align: center;
        z-index: 2;
    }

    .subcaption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        font-size: 1.5rem;
        text-align: center;
        z-index: 2;
    }

    .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: rgba(0, 0, 0, 0.3); */
        z-index: 1;
    }

    .prev,
    .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        padding: 15px 20px;
        background: none;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 24px;
        transition: all 0.3s ease;
        z-index: 3;
        outline: none;

    }

    .prev:focus,
    .next:focus {
        outline: none;
        box-shadow: none;
    }

    .prev:hover,
    .next:hover {
        background: none !important;
    }


    .prev {
        left: 20px;
        border-radius: 3px;
    }

    .next {
        right: 20px;
        border-radius: 3px;
    }

    /*  .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }*/

    /* Dots navigation */
    .dots-container {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 3;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dot.active {
        background-color: #fff;
    }

    @media (max-width: 768px) {
        .caption {
            font-size: 2rem;
            width: 90%;
        }

        .subcaption {
            font-size: 1rem;
            width: 90%;
        }

        .prev,
        .next {
            padding: 10px 15px;
            font-size: 18px;
        }
    }
</style>

<div class="slideshow-container">
    <div class="mySlides">
        <div class="slide-overlay"></div>
        <img src="assets/img/c8.png" class="slide-image" alt="Slide 1">
        <div class="caption">Pioneering Innovation</div>
        <div class="subcaption">Turning Bold Ideas into Digital Excellence</div>
    </div>

    <div class="mySlides">
        <div class="slide-overlay"></div>
        <img src="assets/img/c9.png" class="slide-image" alt="Slide 2">
        <div class="caption">Tech Solutions</div>
        <div class="subcaption">Empowering Progress with Next-Gen Software</div>
    </div>

    <div class="mySlides">
        <div class="slide-overlay"></div>
        <img src="assets/img/c4.png" class="slide-image" alt="Slide 3">
        <div class="caption">Future-Ready Solutions</div>
        <div class="subcaption">Shaping the Digital World, One Innovation at a Time</div>
    </div>

    <div class="mySlides">
        <div class="slide-overlay"></div>
        <img src="assets/img/c7.png" class="slide-image" alt="Slide 4">
        <div class="caption">Technology that Evolves</div>
        <div class="subcaption">Innovating Today, Leading Tomorrow</div>
    </div>


    <button class="prev" aria-label="Previous slide">&#10094;</button>
    <button class="next" aria-label="Next slide">&#10095;</button>

    <div class="dots-container"></div>
</div>

<script>
    let slideIndex = 0;
    let slides = document.getElementsByClassName("mySlides");
    const dotsContainer = document.querySelector('.dots-container');

    for (let i = 0; i < slides.length; i++) {
        const dot = document.createElement('div');
        dot.className = 'dot';
        dot.addEventListener('click', () => {
            slideIndex = i;
            showSlides();
        });
        dotsContainer.appendChild(dot);
    }

    function showSlides() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
            document.querySelectorAll('.dot')[i].classList.remove("active");
        }

        if (slideIndex >= slides.length) slideIndex = 0;
        if (slideIndex < 0) slideIndex = slides.length - 1;

        slides[slideIndex].classList.add("active");
        document.querySelectorAll('.dot')[slideIndex].classList.add("active");
    }

    document.querySelector('.prev').addEventListener('click', () => {
        slideIndex--;
        showSlides();
    });

    document.querySelector('.next').addEventListener('click', () => {
        slideIndex++;
        showSlides();
    });

    function autoAdvance() {
        slideIndex++;
        showSlides();
    }

    showSlides();

    let slideTimer = setInterval(autoAdvance, 5000);

    document.querySelector('.slideshow-container').addEventListener('mouseenter', () => {
        clearInterval(slideTimer);
    });

    document.querySelector('.slideshow-container').addEventListener('mouseleave', () => {
        slideTimer = setInterval(autoAdvance, 4000);
    });
</script>