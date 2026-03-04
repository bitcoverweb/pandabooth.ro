# Configurare Bază de Date - Date Ocupate

## Instrucțiuni de Setup

### 1. Creare Bază de Date

Deschide phpMyAdmin (sau MySQL CLI) și execută:

```sql
CREATE DATABASE IF NOT EXISTS pandabooth;
USE pandabooth;
```

Apoi importă fișierul **database.sql** din folderul proiectului:
- Deschide phpMyAdmin → Selectează "pandabooth" → Tab "Import"
- Selectează fișierul database.sql și importă

Alternativ, execută direct:
```bash
mysql -u root -p pandabooth < database.sql
```

### 2. Configurare Conexiune

Deschide fișierul **ocupate.php** și completează:

```php
$db_host = 'localhost';    // Server-ul tau MySQL (localhost pt local)
$db_user = 'root';         // Utilizator MySQL
$db_pass = '';             // Parola MySQL (lasa gol daca nu ai)
$db_name = 'pandabooth';   // Numele bazei de date
```

### 3. Acces

Deschide în browser:
```
http://localhost/pandabooth.ro new/pandabooth.ro/figma to code/ocupate.php
```

---

## Funcționalități

✅ **Adaugă date ocupate** cu:
- Data
- Ora de inceput și sfarsit
- Nume client (optional)
- Telefon (optional)
- Email (optional)
- Descriere (optional)

✅ **Vedere integrata** a tuturor datelor ocupate

✅ **Validări**:
- Nu permite date în trecut
- Nu permite ore invalide
- Câmpuri obligatorii marchate cu *

---

## Structura Tabel

| Coloana | Tip | Descriere |
|---------|-----|-----------|
| id | INT | ID unic (cheie primara) |
| data | DATE | Data ocupata |
| ora_inceput | TIME | Ora de inceput |
| ora_sfarsit | TIME | Ora de sfarsit |
| nume_client | VARCHAR(100) | Nume client |
| telefon | VARCHAR(20) | Telefon client |
| email | VARCHAR(100) | Email client |
| descriere | TEXT | Note/descriere |
| data_adaugare | TIMESTAMP | Cand a fost adaugata |

---

## Pași Următori (Opțional)

🔧 **Funcții avansate pe care le poti adauga:**
- Buton delete pentru a sterge date
- Buton edit pentru a modifica date existente
- Export calendar (ics format)
- Notificari email/SMS
- API pentru a verifica disponibilitate
- Integrare cu calendar (Google Calendar, etc)

Spune-mi dacă vrei să adaug orice din aceste funcții! 🎯
