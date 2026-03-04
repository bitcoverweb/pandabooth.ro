<?php
// DEBUG PAGE - Verifyează totul
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBUG - Verificare Disponibilitate</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        .section { background: white; padding: 20px; margin: 10px 0; border-radius: 5px; }
        h2 { color: #333; border-bottom: 2px solid #667eea; padding-bottom: 10px; }
        .test { margin: 15px 0; padding: 10px; background: #f9f9f9; border-left: 3px solid #ddd; }
        .success { border-left-color: green; color: green; }
        .error { border-left-color: red; color: red; }
        input { padding: 8px; width: 300px; font-size: 16px; }
        button { padding: 8px 15px; background: #667eea; color: white; border: none; border-radius: 3px; cursor: pointer; }
        #result { background: #e8f5e9; padding: 15px; margin-top: 15px; border-radius: 3px; display: none; }
        #result.error-result { background: #ffebee; }
        code { background: #f0f0f0; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>🔧 DEBUG - Verificare Disponibilitate</h1>

    <div class="section">
        <h2>1️⃣ Test API Direct</h2>
        <div class="test">
            <p>Testează API-ul direct cu o dată:</p>
            <input type="text" id="testDate" placeholder="Ex: 20.08.2026 sau 20 martie 2026" />
            <button onclick="testAPI()">Test API</button>
        </div>
        <div id="result"></div>
    </div>

    <div class="section">
        <h2>2️⃣ Verificare Bază de Date</h2>
        <div id="dbStatus"></div>
    </div>

    <div class="section">
        <h2>3️⃣ Verificare Fișiere</h2>
        <div id="filesStatus"></div>
    </div>

    <script>
        // Test API
        function testAPI() {
            const dateInput = document.getElementById('testDate').value.trim();
            const resultDiv = document.getElementById('result');
            
            if (!dateInput) {
                resultDiv.textContent = '❌ Introdu o dată!';
                resultDiv.classList.add('error-result');
                resultDiv.style.display = 'block';
                return;
            }

            resultDiv.textContent = '⏳ Se testează...';
            resultDiv.classList.remove('error-result');
            resultDiv.style.display = 'block';

            fetch('api_check_date.php?data=' + encodeURIComponent(dateInput))
                .then(response => response.json())
                .then(data => {
                    let html = '<strong>Răspuns API:</strong><br>';
                    html += '<code>' + JSON.stringify(data, null, 2) + '</code><br><br>';
                    
                    if (data.available) {
                        html += '✅ <strong style="color: green;">DATA DISPONIBILĂ!</strong>';
                    } else {
                        html += '❌ <strong style="color: red;">DATA NU ESTE DISPONIBILĂ!</strong>';
                    }
                    
                    resultDiv.innerHTML = html;
                    resultDiv.classList.remove('error-result');
                })
                .catch(error => {
                    resultDiv.innerHTML = '❌ <strong>EROARE:</strong> ' + error.message;
                    resultDiv.classList.add('error-result');
                });
        }

        // Check DB Status
        function checkDBStatus() {
            const dbStatusDiv = document.getElementById('dbStatus');
            
            fetch('check_db_status.php')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    
                    if (data.db_exists) {
                        html += '<div class="test success">✅ Baza de date există!</div>';
                    } else {
                        html += '<div class="test error">❌ Baza de date NU există!</div>';
                    }
                    
                    if (data.table_exists) {
                        html += '<div class="test success">✅ Tabel "ocupate" există!</div>';
                    } else {
                        html += '<div class="test error">❌ Tabel "ocupate" NU există!</div>';
                    }
                    
                    if (data.row_count >= 0) {
                        html += '<div class="test success">✅ Înregistrări în tabel: ' + data.row_count + '</div>';
                    }
                    
                    dbStatusDiv.innerHTML = html;
                })
                .catch(error => {
                    dbStatusDiv.innerHTML = '<div class="test error">❌ Eroare la checking DB: ' + error.message + '</div>';
                });
        }

        // Check Files
        function checkFiles() {
            const filesDiv = document.getElementById('filesStatus');
            
            fetch('check_files.php')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    
                    for (const [file, exists] of Object.entries(data)) {
                        if (exists) {
                            html += '<div class="test success">✅ ' + file + '</div>';
                        } else {
                            html += '<div class="test error">❌ ' + file + ' - LIPSĂ!</div>';
                        }
                    }
                    
                    filesDiv.innerHTML = html;
                })
                .catch(error => {
                    filesDiv.innerHTML = '<div class="test error">❌ Eroare: ' + error.message + '</div>';
                });
        }

        // Run checks on load
        window.addEventListener('load', function() {
            checkDBStatus();
            checkFiles();
        });
    </script>
</body>
</html>
