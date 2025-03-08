<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            height: 80vh; 
            overflow: hidden; 
            display: flex;
            justify-content: center; 
            align-items: center; 
           
        }
 
        .mySlides {
            display: none;
            text-align: center;
        }

        .slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            margin: 0 auto; 
        }

   

        .caption {
    position: absolute;
    top: 40%;
    left: 20%;
    transform: translateY(-50%);
    color: black;
    background-color: rgba(255, 255, 255, 0.5);
    font-size: 70px;
    padding: 10px;
}

.captio {
    position: absolute;
    top: 50%;
    left: 20%;
    transform: translateY(-50%);
    color: black;
    background-color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
    padding: 10px;
}

        @keyframes fade {
            0% { opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0; }
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            padding: 16px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            user-select: none;
            transform: translateY(-50%);
        }

        .prev {
            left: 100;
        }

        .next {
            right: 100;
        }
    </style>
</head>

<body>

<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="img/dezcomm.jpg" class="slide-image">
        <div class="caption">Dezcom </div>
        <div class="captio">Dezcom </div>
    
    </div>

    <div class="mySlides fade">
        <img src="img/12345.jpg" class="slide-image">
    </div>

 

    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

</div>

<script>
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    } 
    slides[slideIndex].style.display = "block";
}

document.querySelector('.prev').addEventListener('click', () => {
    slideIndex--; 
    if (slideIndex < 0) {
        slideIndex = document.getElementsByClassName("mySlides").length - 1; 
    }
    showSlides();
});

document.querySelector('.next').addEventListener('click', () => {
    slideIndex++;
    showSlides();
});

showSlides();
</script>
