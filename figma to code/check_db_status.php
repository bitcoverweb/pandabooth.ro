<?php
header('Content-Type: application/json; charset=utf-8');

$db_file = __DIR__ . '/pandabooth.db';

$response = [
    'db_exists' => false,
    'table_exists' => false,
    'row_count' => 0
];

try {
    if (!file_exists($db_file)) {
        echo json_encode($response);
        exit;
    }
    
    $response['db_exists'] = true;
    
    $conn = new PDO('sqlite:' . $db_file);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if table exists
    $result = $conn->query("SELECT name FROM sqlite_master WHERE type='table' AND name='ocupate'");
    if ($result && $result->fetch()) {
        $response['table_exists'] = true;
        
        // Count rows
        $countResult = $conn->query("SELECT COUNT(*) as count FROM ocupate");
        if ($countResult) {
            $row = $countResult->fetch(PDO::FETCH_ASSOC);
            $response['row_count'] = $row['count'];
        }
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?>
