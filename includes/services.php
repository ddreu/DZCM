<?php
include 'includes/connect.php';

$conn->select_db("dezcom");

$sql = "SELECT service_id, service_name, description, image FROM services";
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