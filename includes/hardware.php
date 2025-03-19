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