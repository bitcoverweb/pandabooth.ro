<?php
// Conexiune SQLite (fără MySQL necesar!)
$db_file = __DIR__ . '/pandabooth.db';

try {
    $conn = new PDO('sqlite:' . $db_file);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Creare tabel dacă nu există
    $conn->exec("
        CREATE TABLE IF NOT EXISTS ocupate (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            data DATE NOT NULL,
            ora_inceput TIME NOT NULL,
            ora_sfarsit TIME NOT NULL,
            nume_client VARCHAR(100),
            telefon VARCHAR(20),
            email VARCHAR(100),
            descriere TEXT,
            data_adaugare TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
} catch (Exception $e) {
    die("Eroare bază de date: " . $e->getMessage());
}

$success_message = '';
$error_message = '';

// Procesare formular
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Construiește data din year, month, day
    $year = $_POST['year'] ?? '';
    $month = $_POST['month'] ?? '';
    $day = $_POST['day'] ?? '';
    
    // Format data: YYYY-MM-DD
    $data = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
    
    $ora_inceput = $_POST['ora_inceput'] ?? '';
    $ora_sfarsit = $_POST['ora_sfarsit'] ?? '';
    $nume_client = $_POST['nume_client'] ?? '';
    $telefon = $_POST['telefon'] ?? '';
    $email = $_POST['email'] ?? '';
    $descriere = $_POST['descriere'] ?? '';
    
    // Validare
    if (!$year || !$month || !$day || !$ora_inceput || !$ora_sfarsit) {
        $error_message = "Data și orele sunt obligatorii!";
    } else {
        // Validare data
        if (!checkdate($month, $day, $year)) {
            $error_message = "Data nu este validă!";
        } else {
            // Verificare dacă data/ora nu sunt în trecut
            $datetime_inceput = strtotime($data . ' ' . $ora_inceput);
            if ($datetime_inceput < time()) {
                $error_message = "Nu poți adăuga date în trecut!";
            } else if ($ora_inceput >= $ora_sfarsit) {
                $error_message = "Ora de sfârşit trebuie să fie după ora de început!";
            } else {
                try {
                    // Insert în SQLite
                    $stmt = $conn->prepare("INSERT INTO ocupate (data, ora_inceput, ora_sfarsit, nume_client, telefon, email, descriere) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$data, $ora_inceput, $ora_sfarsit, $nume_client, $telefon, $email, $descriere]);
                    
                    $success_message = "Data ocupată adăugată cu succes!";
                    // Clear form
                    $_POST = [];
                } catch (Exception $e) {
                    $error_message = "Eroare la adăugare: " . $e->getMessage();
                }
            }
        }
    }
}

// Preluare date ocupate
$ocupatele = [];
$sql = "SELECT * FROM ocupate WHERE data >= DATE('now') ORDER BY data ASC, ora_inceput ASC";

try {
    $result = $conn->query($sql);
    $ocupatele = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $error_message = "Eroare la citire date: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Date Ocupate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .content {
                grid-template-columns: 1fr;
            }
        }
        
        .form-card, .list-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .form-card h2, .list-card h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            font-family: Arial, sans-serif;
        }
        
        .date-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }
        
        .date-input-group {
            display: flex;
            flex-direction: column;
        }
        
        .date-input-group label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        .date-input-group select {
            width: 100%;
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        button:hover {
            background: #764ba2;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        .ocupata-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }
        
        .ocupata-item .data-ora {
            font-weight: bold;
            color: #667eea;
            margin-bottom: 8px;
        }
        
        .ocupata-item .client {
            color: #555;
            margin: 5px 0;
        }
        
        .ocupata-item .contact {
            color: #888;
            font-size: 0.9em;
            margin: 5px 0;
        }
        
        .ocupata-item .descriere {
            color: #666;
            font-style: italic;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 0.95em;
        }
        
        .no-data {
            text-align: center;
            color: #999;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📅 Manager Date Ocupate</h1>
            <p>Administrează datele și orele rezervate</p>
        </div>
        
        <div class="content">
            <!-- Formular -->
            <div class="form-card">
                <h2>Adaugă Data Ocupată</h2>
                
                <?php if ($success_message): ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>
                
                <?php if ($error_message): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-group">
                        <label>Data * (An, Luna, Zi)</label>
                        <div class="date-inputs">
                            <div class="date-input-group">
                                <label for="year">An</label>
                                <select id="year" name="year" required>
                                    <option value="">Selectează an</option>
                                    <?php 
                                    $current_year = date('Y');
                                    for ($y = $current_year; $y <= $current_year + 2; $y++) {
                                        $selected = ($_POST['year'] ?? '') == $y ? 'selected' : '';
                                        echo "<option value='$y' $selected>$y</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="date-input-group">
                                <label for="month">Luna</label>
                                <select id="month" name="month" required>
                                    <option value="">Selectează luna</option>
                                    <?php 
                                    $months = ['01' => 'Ianuarie', '02' => 'Februarie', '03' => 'Martie', '04' => 'Aprilie', '05' => 'Mai', '06' => 'Iunie', '07' => 'Iulie', '08' => 'August', '09' => 'Septembrie', '10' => 'Octombrie', '11' => 'Noiembrie', '12' => 'Decembrie'];
                                    foreach ($months as $num => $name) {
                                        $selected = ($_POST['month'] ?? '') == $num ? 'selected' : '';
                                        echo "<option value='$num' $selected>$num - $name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="date-input-group">
                                <label for="day">Zi</label>
                                <select id="day" name="day" required>
                                    <option value="">Selectează zi</option>
                                    <?php 
                                    for ($d = 1; $d <= 31; $d++) {
                                        $day_str = str_pad($d, 2, '0', STR_PAD_LEFT);
                                        $selected = ($_POST['day'] ?? '') == $day_str ? 'selected' : '';
                                        echo "<option value='$day_str' $selected>$day_str</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="ora_inceput">Ora Inceput *</label>
                        <input type="time" id="ora_inceput" name="ora_inceput" required value="<?php echo $_POST['ora_inceput'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="ora_sfarsit">Ora Sfarsit *</label>
                        <input type="time" id="ora_sfarsit" name="ora_sfarsit" required value="<?php echo $_POST['ora_sfarsit'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="nume_client">Nume Client</label>
                        <input type="text" id="nume_client" name="nume_client" value="<?php echo $_POST['nume_client'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="tel" id="telefon" name="telefon" value="<?php echo $_POST['telefon'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="descriere">Descriere</label>
                        <textarea id="descriere" name="descriere"><?php echo $_POST['descriere'] ?? ''; ?></textarea>
                    </div>
                    
                    <button type="submit">Adaugă Data Ocupată</button>
                </form>
            </div>
            
            <!-- Lista date ocupate -->
            <div class="list-card">
                <h2>Date Ocupate (<?php echo count($ocupatele) ?? 0; ?>)</h2>
                
                <?php if (!empty($ocupatele)): ?>
                    <div>
                        <?php foreach ($ocupatele as $item): ?>
                            <div class="ocupata-item">
                                <div class="data-ora">
                                    📅 <?php echo date('d M Y', strtotime($item['data'])); ?> | 
                                    ⏰ <?php echo $item['ora_inceput']; ?> - <?php echo $item['ora_sfarsit']; ?>
                                </div>
                                
                                <?php if ($item['nume_client']): ?>
                                    <div class="client">👤 <?php echo htmlspecialchars($item['nume_client']); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($item['telefon'] || $item['email']): ?>
                                    <div class="contact">
                                        <?php if ($item['telefon']): ?>
                                            📞 <?php echo htmlspecialchars($item['telefon']); ?>
                                        <?php endif; ?>
                                        <?php if ($item['email']): ?>
                                            📧 <?php echo htmlspecialchars($item['email']); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($item['descriere']): ?>
                                    <div class="descriere"><?php echo nl2br(htmlspecialchars($item['descriere'])); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="no-data">
                        <p>Nu sunt date ocupate pentru zilele următoare</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
