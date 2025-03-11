<?php
include 'includes/connect.php';

$conn->select_db("dezcom");

// Validate and fetch service ID
if (isset($_GET['id'])) {
    $service_id = intval($_GET['id']);
    $sql = "SELECT service_name, description, image FROM services WHERE service_id = $service_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc(); // Fetch only one row
    } else {
        echo "<script>alert('Service not found!'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('No service selected!'); window.location.href='index.php';</script>";
    exit();
}

// After fetching the service details
$sql_features = "SELECT name, description, image FROM service_features WHERE service_id = $service_id";
$result_features = $conn->query($sql_features);
$features = [];
if ($result_features->num_rows > 0) {
    while ($row = $result_features->fetch_assoc()) {
        $features[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($service["service_name"]); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            margin: 0;
        }

        .container {
            position: relative;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 1000px;
            max-width: 100%;
            height: 550px;
            gap: 20px;
            overflow: hidden;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #d40000;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            line-height: 30px;
        }

        .close-btn:hover {
            background: #b30000;
        }

        .image-container {
            width: 70%;
            height: 100%;
            overflow: hidden;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .text-container {
            width: 30%;
            padding: 20px;
            overflow-y: auto;
        }

        .text-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .text-container p {
            font-size: 18px;
            color: #333;
        }

        .advantages-container {
            margin-top: 20px;
        }

        .features-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .feature {
            width: calc(33.33% - 20px);
            /* Adjust width as needed */
            background: white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .feature img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .feature h3 {
            margin: 10px 0;
            font-size: 20px;
        }

        .feature p {
            font-size: 16px;
            color: #666;
        }

        .carousel-container {
            width: 50%;
            height: 100%;
            overflow: hidden;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .carousel-item {
            width: 100%;
            height: 100%;
            flex-shrink: 0;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .features {
            margin-top: 4rem;
        }

        .features p {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <button class="close-btn" onclick="closeForm()">&times;</button>

        <!-- Carousel for Service Image -->
        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-item">
                    <img src="admin/includes/uploads/services/<?php echo htmlspecialchars($service['image']); ?>" alt="Service Image">
                </div>
                <?php if (!empty($features)):
                ?>
                    <?php foreach ($features as $feature): ?>
                        <?php if (!empty($feature['image'])):
                        ?>
                            <div class="carousel-item">
                                <img src="admin/includes/uploads/service-feature/<?php echo htmlspecialchars($feature['image']); ?>" alt="<?php echo htmlspecialchars($feature['name']); ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Service Info -->
        <div class="text-container">
            <h2><?php echo htmlspecialchars($service['service_name']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>

            <!-- Features List -->
            <div class="features">
                <h3>Features:</h3>
                <ul class="advantages-list">
                    <?php foreach ($features as $feature): ?>
                        <li>
                            <h4><?php echo htmlspecialchars($feature['name']); ?></h4>
                            <p><?php echo nl2br(htmlspecialchars($feature['description'])); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        let currentIndex = 0;

        function nextSlide() {
            const carousel = document.querySelector('.carousel');
            const items = document.querySelectorAll('.carousel-item');
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        }

        function prevSlide() {
            const carousel = document.querySelector('.carousel');
            const items = document.querySelectorAll('.carousel-item');
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        }

        function updateCarousel() {
            const carousel = document.querySelector('.carousel');
            const offset = -currentIndex * 100; // Adjust based on item width
            carousel.style.transform = `translateX(${offset}%)`;
        }

        function closeForm() {
            window.location.href = 'index.php';
        }
    </script>
</body>

</html>