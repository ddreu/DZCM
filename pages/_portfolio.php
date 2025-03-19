<div class="about-section">
    <div class="container">
        <div class="contact-header">
            <h2 class="section-title">Our Portfolio</h2>
            <p class="section-subtitle">Explore our portfolio of successful projects and applications.</p>
        </div>
        <hr class="section-divider" />
    </div>

    <!-- Filter Buttons -->
    <div class="portfolio-filter">
        <button class="filter-btn active" data-category="all">All</button>
        <?php
        include 'includes/connect.php';

        $conn->select_db("dezcom");

        // Fetch unique categories from the database
        $sql = "SELECT DISTINCT category FROM services WHERE category IS NOT NULL";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $category = htmlspecialchars($row['category']);
            echo '<button class="filter-btn" data-category="' . $category . '">' . ucfirst($category) . '</button>';
        }
        ?>
    </div>

    <!-- Services Section -->
    <div class="services">
        <?php
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