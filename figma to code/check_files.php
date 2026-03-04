<?php
header('Content-Type: application/json; charset=utf-8');

$files = [
    'ocupate.php' => __DIR__ . '/ocupate.php',
    'api_check_date.php' => __DIR__ . '/api_check_date.php',
    'pandabooth.db' => __DIR__ . '/pandabooth.db',
    'index.php' => __DIR__ . '/index.php',
];

$response = [];
foreach ($files as $name => $path) {
    $response[$name] = file_exists($path);
}

echo json_encode($response);
?>
