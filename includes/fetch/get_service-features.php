<?php
include '../connect.php';

$conn->select_db("dezcom");

if (isset($_GET['id'])) {
    $serviceId = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT service_id, service_name, description, image FROM services WHERE service_id = ?");
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();

    if ($service) {
        $stmt = $conn->prepare("SELECT name, description, image FROM service_features WHERE service_id = ?");
        $stmt->bind_param("i", $serviceId);
        $stmt->execute();
        $featuresResult = $stmt->get_result();
        $features = $featuresResult->fetch_all(MYSQLI_ASSOC);

        echo json_encode([
            'success' => true,
            'service' => $service,
            'features' => $features
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Service not found'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request'
    ]);
}
