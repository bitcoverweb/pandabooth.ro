<?php
header('Content-Type: application/json; charset=utf-8');

// Conexiune SQLite
$db_file = __DIR__ . '/pandabooth.db';

try {
    $conn = new PDO('sqlite:' . $db_file);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(json_encode(['error' => 'Eroare bază de date']));
}

// Preluie data de la request
$input_date = $_GET['data'] ?? '';

if (empty($input_date)) {
    die(json_encode(['available' => false, 'message' => 'Data nu a fost furnizată']));
}

// Parse diverse formate de dată
$date = parseDate($input_date);

if (!$date) {
    die(json_encode(['available' => false, 'message' => 'Format de dată invalid']));
}

// Formatează data în YYYY-MM-DD
$formatted_date = date('Y-m-d', strtotime($date));

// Verifică dacă data este în trecut
if (strtotime($formatted_date) < strtotime('today')) {
    die(json_encode(['available' => false, 'message' => 'Data este în trecut']));
}

// Caută în baza de date
try {
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count FROM ocupate 
        WHERE data = ?
    ");
    $stmt->execute([$formatted_date]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $is_occupied = $result['count'] > 0;
    
    echo json_encode([
        'available' => !$is_occupied,
        'date' => $formatted_date,
        'message' => $is_occupied ? 'Data nu este disponibilă!' : 'Data este disponibilă!'
    ]);
} catch (Exception $e) {
    echo json_encode(['available' => false, 'message' => 'Eroare la cautare']);
}

// Funcție pentru parse diverse formate de dată
function parseDate($input) {
    // Format: dd.mm.yyyy (20.08.2026)
    if (preg_match('/^(\d{1,2})\.(\d{1,2})\.(\d{4})$/', $input, $matches)) {
        return $matches[3] . '-' . str_pad($matches[2], 2, '0', STR_PAD_LEFT) . '-' . str_pad($matches[1], 2, '0', STR_PAD_LEFT);
    }
    
    // Format: dd/mm/yyyy (20/08/2026)
    if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $input, $matches)) {
        return $matches[3] . '-' . str_pad($matches[2], 2, '0', STR_PAD_LEFT) . '-' . str_pad($matches[1], 2, '0', STR_PAD_LEFT);
    }
    
    // Format: yyyy-mm-dd (2026-08-20)
    if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $input, $matches)) {
        return $input;
    }
    
    // Mapping lunilor în limba română → Engleză
    $romanian_months = [
        'ianuarie' => '01',
        'februarie' => '02',
        'martie' => '03',
        'aprilie' => '04',
        'mai' => '05',
        'iunie' => '06',
        'iulie' => '07',
        'august' => '08',
        'septembrie' => '09',
        'octombrie' => '10',
        'noiembrie' => '11',
        'decembrie' => '12',
    ];
    
    // Încearcă să parseze format "13 mai 2026"
    $input_lower = strtolower(trim($input));
    
    // Caută luna în text
    foreach ($romanian_months as $romanian_month => $month_num) {
        if (strpos($input_lower, $romanian_month) !== false) {
            // Extrage ziua și anul
            if (preg_match('/(\d{1,2})\s+' . $romanian_month . '\s+(\d{4})/i', $input, $matches)) {
                $day = str_pad($matches[1], 2, '0', STR_PAD_LEFT);
                $year = $matches[2];
                return $year . '-' . $month_num . '-' . $day;
            }
        }
    }
    
    // Fallback: Încearcă cu strtotime (pentru formate în engleză)
    $timestamp = @strtotime($input);
    if ($timestamp) {
        return date('Y-m-d', $timestamp);
    }
    
    return null;
}
?>
