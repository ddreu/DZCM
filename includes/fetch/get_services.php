<?php
include '../connect.php';

$conn->select_db("dezcom");

$category = $_POST['filter_category'] ?? 'all';

$sql = "SELECT service_id, service_name, description, image, category FROM services";

if ($category !== 'all') {
    $sql .= " WHERE category = ?";
}

$stmt = $conn->prepare($sql);

if ($category !== 'all') {
    $stmt->bind_param("s", $category);
}

$stmt->execute();
$result = $stmt->get_result();

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

$stmt->close();
$conn->close();
