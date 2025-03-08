<?php
include 'includes/connect.php';

$conn->select_db("dezcom");

// Check if service ID is set
if (isset($_GET['id'])) {
    $service_id = intval($_GET['id']);
    $sql = "SELECT * FROM service_features WHERE service_id = $service_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $services = []; // Store multiple results
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    } else {
        echo "<script>alert('Service not found!'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('No service selected!'); window.location.href='index.php';</script>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($services[0]["name"]); ?></title>
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
            gap: 30px;
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

        .slider-container {
            width: 70%;
            height: 100%;
            overflow: hidden;
            border-radius: 8px;
            position: relative;
        }

        .slider {
            display: flex;
            width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .prev-btn, .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
            border: none;
            font-size: 24px;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <button class="close-btn" onclick="closeForm()">&times;</button>
        
    
        <div class="slider-container">
            <div class="slider">
                <?php foreach ($services as $service) { ?>
                    <img src="dzcm/images/<?php echo htmlspecialchars($service["image"]); ?>" alt="Service Image" class="slide">
                <?php } ?>
            </div>
       
            <button class="prev-btn" onclick="prevSlide()">&#10094;</button>
            <button class="next-btn" onclick="nextSlide()">&#10095;</button>
        </div>

     
        <div class="text-container">
            <h2><?php echo htmlspecialchars($services[0]["name"]); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($services[0]["description"])); ?></p>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const slider = document.querySelector('.slider');

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function closeForm() {
            window.location.href = 'index.php'; 
        }
    </script>
</body>
</html>
