<?php
include 'includes/connect.php'; 


$conn->select_db("dezcom");


$sql = "SELECT * FROM service_features";
$result = $conn->query($sql);
?>


<div class="featured-separator">
    <span>Featured Applications</span>
</div>

<div class="featured-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="featured-box">
                <div class="featured-label">FEATURED</div>
                <div class="image-container">
                    <img src="dzcm/images/'.$row["image"].'" alt="'.$row["name"].'">
                    <a href="/dezcomm/'.$row["service_id"].'.php" class="discover-btn">DISCOVER</a>
                </div>
                <div class="featured-content">
                    <h3>'.$row["name"].'</h3>
                    <p>'.$row["description"].'</p>
                </div>
            </div>';
        }
    } else {
        echo "<p>No featured services found.</p>";
    }
    $conn->close();
    ?>
</div>
