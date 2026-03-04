-- Tabel pentru datele ocupate
CREATE TABLE IF NOT EXISTS `ocupate` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `data` DATE NOT NULL,
  `ora_inceput` TIME NOT NULL,
  `ora_sfarsit` TIME NOT NULL,
  `nume_client` VARCHAR(100),
  `telefon` VARCHAR(20),
  `email` VARCHAR(100),
  `descriere` TEXT,
  `data_adaugare` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_data` (`data`),
  INDEX `idx_ora` (`ora_inceput`, `ora_sfarsit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
