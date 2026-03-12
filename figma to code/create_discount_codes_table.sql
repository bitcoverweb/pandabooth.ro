-- Tabel pentru stocare coduri de reduceri generate prin joc
CREATE TABLE IF NOT EXISTS discount_codes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  cod_reduceri VARCHAR(10) NOT NULL UNIQUE,
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  stare ENUM('activ', 'inactiv', 'folosit') DEFAULT 'inactiv',
  INDEX idx_email (email),
  INDEX idx_cod_reduceri (cod_reduceri),
  INDEX idx_stare (stare)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
