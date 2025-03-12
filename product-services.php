<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="about-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">Our services are designed to help you achieve your goals.<br> We offer a wide range of services to help you grow your business</p>

            </div>
            <hr class="section-divider" />


            <!-- Services We Provide Section -->
            <section class="services-section mb-5 mt-5 pb-5">
                <h2 class="services-title">Software Design and Development Services</h2>
                <div class="services-subtitle">
                    <p class="mb-5">Here at Dezcom, we can assist you in conceptualizing the right software solutions to meet all your business requirements. From project initiation, analysis, product design, software development up to extensive testing and bugs fixing, our talented software engineers are always ready to help.</p>
                    <h5>Our Services Include:</h5>
                </div>
                <div class=" services-container">
                    <div class="service-box">
                        <span class="material-icons service-icon">devices</span>
                        <h3>Software Design and Development</h3>
                        <p>We offer full-service software development services for web, mobile and desktop applications that are visually appealing and functional to meet your business system requirements.</p>
                    </div>

                    <div class="service-box">
                        <span class="material-icons service-icon">cloud_sync</span>
                        <h3>Support and Maintenance</h3>
                        <p>We specialize in providing software and application support services to achieve maximum availability, performance, and security.</p>
                    </div>

                    <div class="service-box">
                        <span class="material-icons service-icon">qr_code</span>
                        <h3>Products and Services</h3>
                        <p>We provide top-of-the-line products and services at competitive rates to meet all your software and hardware needs.</p>
                    </div>
                </div>
            </section>
            <h1 class="mt-5">Services</h1>
            <div class=" services-separator mt-0">
            </div>
            <?php include 'main/services.php'; ?>

        </div>
    </div>
    <?php //include 'main/featured.php'; 
    ?>

    <?php include 'includes/footer.php'; ?>
    <script src=" includes/script.js">
    </script>
</body>

</html>