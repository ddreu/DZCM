<div class="about-section">
    <div class="container">
        <div class="contact-header">
            <h2 class="section-title">Our Portfolio</h2>
            <p class="section-subtitle">Explore our portfolio of successful projects and applications.</p>
        </div>
        <hr class="section-divider" />
    </div>

    <div class="portfolio-filter">
        <button class="filter-btn active" data-category="all">All</button>
        <button class="filter-btn" data-category="web-app">Web Development</button>
        <button class="filter-btn" data-category="desktop-app">Desktop</button>
        <button class="filter-btn" data-category="mobile-app">Mobile</button>

    </div>

    <!-- Services Section -->
    <div class="services">
        <?php
        include 'includes/connect.php';

        $conn->select_db("dezcom");

        $sql = "SELECT service_id, service_name, description, image, category FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                        <div class="services-box" data-category="' . htmlspecialchars($row["category"]) . '">
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

        ?>
    </div>
</div>

<script>
    // document.addEventListener("DOMContentLoaded", () => {
    //     const filterButtons = document.querySelectorAll(".filter-btn");
    //     const serviceBoxes = document.querySelectorAll(".services-box");

    //     filterButtons.forEach((button) => {
    //         button.addEventListener("click", () => {
    //             filterButtons.forEach((btn) => btn.classList.remove("active"));
    //             button.classList.add("active");

    //             const category = button.getAttribute("data-category");

    //             serviceBoxes.forEach((box) => {
    //                 if (
    //                     category === "all" ||
    //                     box.getAttribute("data-category") === category
    //                 ) {
    //                     box.style.display = "block";
    //                 } else {
    //                     box.style.display = "none";
    //                 }
    //             });
    //         });
    //     });

    //     document.querySelector('.filter-btn[data-category="all"]').click();
    // });
</script>