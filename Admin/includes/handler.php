<?php
ob_start();

require_once 'process.php';
//$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$action = $_GET['action'];


$process = new Process();

try {
    switch ($action) {
        case 'login':
            $result = $process->login();
            echo $result;
            break;

        case 'logout':
            $result = $process->logout();
            echo $result;
            break;

        case 'add_service':
            $result = $process->addService();
            echo $result;
            break;

        case 'get_service_features':
            $serviceId = $_GET['service_id'] ?? null;
            $result = $process->getServiceFeatures($serviceId);
            echo $result;
            break;

        case 'add_service_feature':
            $result = $process->addServiceFeature();
            echo $result;
            break;

        default:
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid action'
            ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'An unexpected error occurred: ' . $e->getMessage()
    ]);
}

ob_end_flush();
