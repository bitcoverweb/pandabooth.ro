<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

header('Content-Type: application/json; charset=UTF-8');

// DATABASE
$db_file = __DIR__ . '/pandabooth.db';

try {
    if (!file_exists($db_file)) {
        throw new Exception("Database file not found");
    }
    
    $conn = new SQLite3($db_file, SQLITE3_OPEN_READWRITE);
    $conn->busyTimeout(5000);
} catch (Exception $e) {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Database error']);
    exit;
}

// INPUT
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$cod_reduceri = isset($_POST['cod_reduceri']) ? trim($_POST['cod_reduceri']) : '';

if (empty($email) || empty($cod_reduceri)) {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Email și cod sunt obligatorii']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Email invalid']);
    exit;
}

// CREATE TABLE
$create_table_sql = "CREATE TABLE IF NOT EXISTS discount_codes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL,
    cod_reduceri TEXT NOT NULL UNIQUE,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    stare TEXT DEFAULT 'activ'
)";

$conn->exec($create_table_sql);

// CHECK DUPLICATE
$check_sql = "SELECT id FROM discount_codes WHERE cod_reduceri = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bindValue(1, $cod_reduceri, SQLITE3_TEXT);
$check_result = $check_stmt->execute();

if ($check_result->fetchArray(SQLITE3_ASSOC)) {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Cod invalid']);
    exit;
}

// SAVE TO DATABASE
$insert_sql = "INSERT INTO discount_codes (email, cod_reduceri, stare) VALUES (?, ?, 'activ')";
$insert_stmt = $conn->prepare($insert_sql);
$insert_stmt->bindValue(1, $email, SQLITE3_TEXT);
$insert_stmt->bindValue(2, $cod_reduceri, SQLITE3_TEXT);

if (!$insert_stmt->execute()) {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Eroare la salvare']);
    exit;
}

// EMAIL
$subject = "Discount 10%";

$html_body = "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; background-color: #f5f5f5; }
        .container { max-width: 600px; margin: 20px auto; padding: 0; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background: linear-gradient(135deg, #ff6b6b 0%, #ff8787 100%); color: white; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 28px; }
        .content { padding: 30px 20px; }
        .coupon-box { background-color: #ffd93d; padding: 20px; font-size: 28px; font-weight: bold; text-align: center; border-radius: 8px; letter-spacing: 2px; margin: 25px 0; color: #333; border: 2px solid #ffb700; }
        .info { background-color: #f0f8ff; padding: 15px; border-left: 4px solid #2196F3; margin: 15px 0; border-radius: 4px; }
        .footer { background-color: #f5f5f5; padding: 20px; text-align: center; color: #666; font-size: 12px; border-top: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>🎉 Felicitări!</h1>
            <p>Ai câștigat o reducere de 10%</p>
        </div>
        
        <div class='content'>
            <p>Dragă client,</p>
            <p>Te felicităm! Ai câștigat o reducere de <strong>10%</strong> la serviciile Panda Booth AI!</p>
            
            <div class='info'>
                <strong>Codul tău de reducere:</strong>
                <div class='coupon-box'>" . htmlspecialchars($cod_reduceri) . "</div>
                <p style='margin: 10px 0 0 0; color: #155724;'><strong>✓ Codul este ACTIV și gata de utilizare</strong></p>
            </div>
            
            <h3>Cum să folosești codul:</h3>
            <ol>
                <li>Accesează site-ul: <strong>pandabooth.ro</strong></li>
                <li>Alege pachetul dorit</li>
                <li>Introduceți codul la checkout</li>
                <li>Bucură-te de 10% reducere!</li>
            </ol>
            
            <p><strong>Detalii:</strong></p>
            <ul>
                <li>Valabil pentru 30 de zile</li>
                <li>Folosibil o singură dată</li>
                <li>Se aplică la toate pachetele</li>
            </ul>
            
            <div style='margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;'>
                <p>📞 Telefon: <strong>0726 144 144</strong></p>
                <p>📧 Email: <strong>contact@pandabooth.ro</strong></p>
                <p>Disponibili 24/7 pentru a te ajuta!</p>
            </div>
        </div>
        
        <div class='footer'>
            <p>&copy; 2026 Panda Booth AI. Toate drepturile rezervate.</p>
        </div>
    </div>
</body>
</html>";

// SEND EMAIL
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: Quoted-Printable\r\n";
$headers .= "From: PANDABOOTH <contact@pandabooth.ro>\r\n";
$headers .= "Reply-To: contact@pandabooth.ro\r\n";
$headers .= "Return-Path: contact@pandabooth.ro\r\n";

$email_body = quoted_printable_encode($html_body);
$mail_sent = mail($email, $subject, $email_body, $headers, '-f contact@pandabooth.ro');

// CLOSE DATABASE
$conn->close();

// RESPONSE
$response = [
    'success' => true,
    'message' => 'Codul a fost salvat și activat! Email trimis cu succes. Verifică și folder-ul de spam. Codul: ' . htmlspecialchars($cod_reduceri)
];

ob_end_clean();
echo json_encode($response);
exit;
