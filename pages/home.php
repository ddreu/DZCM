    <?php include 'includes/imgslider.php'; ?>

    <?php
    $query = "SELECT * FROM clients";
    $result = $conn->query($query);

    $clients = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
    }

    $chunks = array_chunk($clients, 4);
    ?>
    <section class="clients-carousel-section">
        <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($chunks as $index => $chunk): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="row justify-content-center">
                            <?php foreach ($chunk as $client): ?>
                                <div class="col-3 d-flex justify-content-center">
                                    <img src="admin/includes/uploads/clients/<?= htmlspecialchars($client['image']) ?>"
                                        class="client-img"
                                        alt="<?= htmlspecialchars($client['client_name']) ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

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
        <?php
        include 'includes/connect.php';

        $conn->select_db("dezcom");

        $sql = "SELECT service_id, service_name, description, image FROM services LIMIT 9";
        $result = $conn->query($sql);
        ?>


        <div class="services">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
            <div class="services-box" data-category="' . htmlspecialchars($row["service_name"]) . '">
                <div class="image-container">
                    <img src="admin/includes/uploads/services/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["service_name"]) . '">
                    <a href="#" class="discover-btn" data-type="service" data-id="' . htmlspecialchars($row["service_id"]) . '">Discover More</a>
                </div>
                <div class="services-content">
                    <h3>' . htmlspecialchars($row["service_name"]) . '</h3>
                    <p>' . htmlspecialchars($row["description"]) . '</p>
                </div>
            </div>';
                }
            } else {
                echo "<p>No services found.</p>";
            }
            $conn->close();
            ?>
        </div>
        <h1 class="mt-5 ms-4 " style="text-align: left;"><strong>Hardware Products</strong></h1>
        <hr class="blackdivider">
        <?php
        include 'includes/connect.php';

        $conn->select_db("dezcom");

        $sql = "SELECT hardware_id, name, description, image FROM hardware LIMIT 9";
        $result = $conn->query($sql);
        ?>

        <div class="services">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
            <div class="hardware-card" data-category="' . htmlspecialchars($row["name"]) . '">
                <div class="hardware-img-wrapper">
                    <img src="admin/includes/uploads/hardware/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">
                </div>
                <div class="hardware-info">
                    <h3 class="hardware-title">' . htmlspecialchars($row["name"]) . '</h3>
                    <p class="hardware-description">' . htmlspecialchars($row["description"]) . '</p>
                    <a href="#" 
                        class="hardware-btn" 
                        data-type="hardware"
                        data-id="' . htmlspecialchars($row["hardware_id"]) . '"
                        data-name="' . htmlspecialchars($row["name"]) . '"
                        data-description="' . htmlspecialchars($row["description"]) . '"
                        data-image="admin/includes/uploads/hardware/' . htmlspecialchars($row["image"]) . '">
                        View Details
                    </a>
                </div>
            </div>';
                }
            } else {
                echo "<p>No hardware found.</p>";
            }
            $conn->close();
            ?>
        </div>
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