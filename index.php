<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>

    <main class="main-content">
        <?php


        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $allowed_pages = ['home', 'about', 'products-services', 'portfolio', 'careers', 'contact', 'clients'];

        if (in_array($page, $allowed_pages) && file_exists("pages/$page.php")) {
            include("pages/$page.php");
            include 'pages/chat.php';
        } else {
            echo "<h2>Page not found!</h2>";
        }

        ?>
    </main>

    <?php include 'includes/footer.php'; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>
    <script src="js/home.js"></script>
    <script src="js/modals.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/chat-utils.js"></script>
    <script src="js/clients.js"></script>
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }

        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const navWrapper = document.querySelector('.nav-wrapper');

            if (window.scrollY > lastScrollY) {
                navWrapper.classList.add('hide');
            } else {
                navWrapper.classList.remove('hide');
            }

            lastScrollY = window.scrollY;
        });
    </script>
</body>

</html>