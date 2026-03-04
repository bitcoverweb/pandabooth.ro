<?php
echo "<h1>✅ Test PHP - Funcționează!</h1>";

// Test 1: PHP Version
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";

// Test 2: MySQLi Extension
if (extension_loaded('mysqli')) {
    echo "<p style='color: green'><strong>✅ MySQLi Extension:</strong> Instalat</p>";
} else {
    echo "<p style='color: red'><strong>❌ MySQLi Extension:</strong> NU Instalat - Contactează administrator!</p>";
}

// Test 3: Test conexiune MySQL
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'pandabooth';

echo "<h2>Test Conexiune MySQL:</h2>";

$conn = new mysqli($db_host, $db_user, $db_pass);

if ($conn->connect_error) {
    echo "<p style='color: red'><strong>❌ Eroare conexiune MySQL:</strong> " . $conn->connect_error . "</p>";
    echo "<p><strong>Soluții:</strong></p>";
    echo "<ul>";
    echo "<li>Verifică dacă MySQL este pornit</li>";
    echo "<li>Verifică credențialele (user: $db_user, pass: $db_pass)</li>";
    echo "<li>Verifică dacă serverul e pe: $db_host</li>";
    echo "</ul>";
} else {
    echo "<p style='color: green'><strong>✅ Conectat la MySQL!</strong></p>";
    
    // Test 4: Verifică dacă baza de date există
    $databases = $conn->query("SHOW DATABASES");
    $db_exists = false;
    
    while ($db = $databases->fetch_assoc()) {
        if ($db['Database'] === $db_name) {
            $db_exists = true;
            break;
        }
    }
    
    if ($db_exists) {
        echo "<p style='color: green'><strong>✅ Baza de date '$db_name' există!</strong></p>";
        
        // Test 5: Verifică tabel
        $conn->select_db($db_name);
        $table_check = $conn->query("SHOW TABLES LIKE 'ocupate'");
        
        if ($table_check && $table_check->num_rows > 0) {
            echo "<p style='color: green'><strong>✅ Tabel 'ocupate' există!</strong></p>";
        } else {
            echo "<p style='color: orange'><strong>⚠️ Tabel 'ocupate' NU există!</strong></p>";
            echo "<p>Rulează script-ul database.sql din phpMyAdmin!</p>";
        }
    } else {
        echo "<p style='color: orange'><strong>⚠️ Baza de date '$db_name' NU există!</strong></p>";
        echo "<p><strong>Soluție:</strong> Crează baza de date și importă database.sql</p>";
    }
    
    $conn->close();
}

echo "<hr>";
echo "<p><a href='ocupate.php'><button style='padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer;'>Merge la ocupate.php →</button></a></p>";
?>
