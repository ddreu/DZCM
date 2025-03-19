    <?php include 'includes/imgslider.php'; ?>
    <!-- Services We Provide Section -->
    <div class="container mb-0">
        <section class="services-section mt-5 mb-5 pb-5">
            <h2 class="services-title pt-5"><strong> Services We Provide </strong></h2>
            <div class="services-container">
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

        <h1 class="mt-5 ms-4" style="text-align: left;"><strong>Services</strong></h1>
        <hr class="blackdivider">
        <?php include 'includes/services.php'; ?>

        <h1 class="mt-5 ms-4 " style="text-align: left;"><strong>Hardware Products</strong></h1>
        <hr class="blackdivider">
        <?php include 'includes/hardware.php'; ?>
        <a href="index.php?page=products-services"
            class="hardware-btn mt-5 mb-0 pb-3 pt-3 ms-4 me-4"><strong>VIEW ALL PRODUCTS</strong></a>
    </div>



    <!-- success in numbers -->
    <?php
    include 'includes/connect.php';
    $conn->select_db("dezcom");

    $sqlClients = "SELECT COUNT(*) AS total_clients FROM clients";
    $resultClients = $conn->query($sqlClients);
    $totalClients = $resultClients->fetch_assoc()['total_clients'];

    $sqlServices = "SELECT COUNT(*) AS total_services FROM services";
    $resultServices = $conn->query($sqlServices);
    $totalServices = $resultServices->fetch_assoc()['total_services'];

    $conn->close();
    ?>

    <section class="success-numbers">
        <div class="success-overlay"></div>
        <div class="success-content">
            <h2>Success In Numbers</h2>
            <div class="numbers-container">
                <div class="number-box">
                    <i class="fas fa-users"></i>
                    <span class="counter" data-target="<?php echo (int) $totalClients; ?>">0</span>
                    <p>HAPPY CLIENTS</p>
                </div>
                <div class="number-box">
                    <i class="fas fa-check-square"></i>
                    <span class="counter" data-target="<?php echo $totalServices; ?>">0</span>
                    <p>PROJECTS COMPLETED</p>
                </div>
                <div class="number-box">
                    <i class="fas fa-clock"></i>
                    <span class="counter" data-target="2199">0</span>
                    <p>HOURS COMPLETED</p>
                </div>
            </div>
        </div>
    </section>

    <div class="profile-separator">
        <h1><strong>Why Choose Us</strong></h1>

    </div>

    <div class="content-wrapper">

        <div class="left-content">
            <h2>Our Mission</h2>
            <p>Misson at Dezcom System Development & I.T. Solutions, our mission is to pioneer innovative solutions in system development and hardware integration, empowering businesses and individuals to thrive in the digital age. We are committed to delivering cutting-edge technologies and unparalleled support, ensuring seamless integration and optimal performance for our clients.
            </p>

            <h2>Our Vision</h2>
            <p>Our vision at Dezcom System Development & I.T. Solutions is to be the forefront leader in revolutionizing system development and hardware solutions globally. We aspire to continuously push the boundaries of technology, fostering a world where connectivity, efficiency, and innovation converge to unlock limitless possibilities for our clients and communities.</p>
        </div>


        <div class="right-form">
            <form id="quoteFormNonModal" action="send-quote.php" method="POST" class="form-container">
                <h2><strong>Get a Free Quote</strong></h2>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="phone" placeholder="Phone" required>
                <input type="text" name="website" placeholder="Website">
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit" class="btn">GET A QUOTE</button>
            </form>
        </div>
    </div>
    <script>
        // document.addEventListener(' DOMContentLoaded', function() {
        // const counters=document.querySelectorAll('.counter');
        // let started=false;

        // function startCount(entries, observer) {
        // entries.forEach(entry=> {
        // if (entry.isIntersecting && !started) {
        // started = true;
        // counters.forEach(counter => {
        // const target = +counter.getAttribute('data-target');
        // const duration = 2000;
        // const increment = target / (duration / 16);
        // let current = 0;

        // const updateCounter = () => {
        // current += increment;
        // if (current < target) {
        // counter.textContent=Math.ceil(current);
        // requestAnimationFrame(updateCounter);
        // } else {
        // counter.textContent=target;
        // }
        // };

        // updateCounter();
        // });
        // observer.unobserve(entry.target);
        // }
        // });
        // }

        // const observer=new IntersectionObserver(startCount, {
        // threshold: 0.3
        // });

        // observer.observe(document.querySelector('.success-numbers'));
        // });
    </script>