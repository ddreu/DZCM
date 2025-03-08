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
    </style>
</head>
<body>
    <div class="container">
        <button class="close-btn" onclick="closeForm()">&times;</button>

        <!-- Service Image -->
        <div class="image-container">
            <img src="dzcm/images/<?php echo htmlspecialchars($service['image']); ?>" alt="Service Image">
        </div>

        <!-- Service Info -->
        <div class="text-container">
            <h2><?php echo htmlspecialchars($service['service_name']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>
        </div>
    </div>

    <script>
        function closeForm() {
            window.location.href = 'index.php'; 
        }
    </script>
</body>
</html>
