<?php
include 'includes/connect.php';

$conn->select_db("dezcom");


$sql = "SELECT * FROM services";
$result = $conn->query($sql);
?>
<div class="services-separator">
    <span>Services</span>
</div>

<div class="services">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="services-box" data-category="'.$row["service_name"].'">
                <div class="image-container">
                    <img src="dzcm/images/'.$row["image"].'" alt="'.$row["service_name"].'">
                    <button class="discover-btn">Discover More</button>
                </div>
                <div class="services-content">
                    <h3>'.$row["service_name"].'</h3>
                    <p>'.$row["description"].'</p>
                </div>
            </div>';
        }
    } else {
        echo "<p>No services found.</p>";
    }
    $conn->close();
    ?>
</div>
