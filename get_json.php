<?php
if (isset($_GET['jsonPath'])) {
    $jsonPath = $_GET['jsonPath'];
    $jsonData = file_get_contents($jsonPath);

    header('Content-Type: application/json');
    echo $jsonData;
} else {
    echo json_encode(['error' => 'Invalid request']);
}
