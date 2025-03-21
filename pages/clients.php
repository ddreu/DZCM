<div class="about-section">
    <div class="container">
        <div class="contact-header">
            <h2 class="section-title">Clients</h2>
            <p class="section-subtitle">Take a look at our valued clients</p>
        </div>
        <hr class="section-divider" />
    </div>

    <!-- Filter Buttons -->
    <div class="portfolio-filter">
        <button class="filter-btn active" data-category="all">All</button>
        <?php
        include 'includes/connect.php';

        $conn->select_db("dezcom");

        $sql = "SELECT DISTINCT category FROM services WHERE category IS NOT NULL";
        // $sql = "SELECT DISTINCT service_name FROM services WHERE service_id IS NOT NULL";

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $category = htmlspecialchars($row['category']);
            echo '<button class="filter-btn" data-category="' . $category . '">' . ucfirst($category) . '</button>';
        }
        ?>
    </div>

    <!-- Services Section -->
    <div class="services" id="servicesContainer">
        <?php
        $sql = "SELECT c.client_id, c.service_id, c.client_name, c.description, c.image, s.service_name, s.category 
        FROM clients c
        INNER JOIN services s
        ON c.service_id = s.service_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
            <div class="clients-box" data-category="' . htmlspecialchars($row["category"]) . '">
                <div class="image-container">
                    <img src="admin/includes/uploads/clients/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["client_name"]) . '">
                    <a class="discover-btn" data-type="clients" data-id="' . htmlspecialchars($row["client_id"]) . '">Discover More</a>
                </div>
                <div class="services-content">
                    <h3>' . htmlspecialchars($row["client_name"]) . '</h3>
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