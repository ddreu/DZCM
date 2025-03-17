<?php
include 'includes/connect.php';

$conn->select_db("dezcom");

$sql = "SELECT hardware_id, name, description, image FROM hardware";
$result = $conn->query($sql);
?>


<div class="services">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="services-box" data-category="' . htmlspecialchars($row["name"]) . '">
                <div class="image-container">
                    <img src="admin/includes/uploads/hardware/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">
                    <a href="#" class="discover-btn" data-id="' . htmlspecialchars($row["hardware_id"]) . '">Discover More</a>
                </div>
                <div class="services-content">
                    <h3>' . htmlspecialchars($row["name"]) . '</h3>
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