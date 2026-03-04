# Varianta SQLite - Fără XAMPP! ⚡

## 🚀 Cum să rulezi

### Opțiunea 1: Double-click (Cel mai ușor!)

1. Mergi în folderul: **`figma to code`**
2. **Double-click** pe **`start-server.bat`**
3. Deschide browserul: **http://localhost:8000/ocupate.php**

Gata! Serverul merge! 🎉

---

### Opțiunea 2: Command Line (Manual)

Deschide PowerShell/Terminal în folderul `figma to code`:

```powershell
php -S localhost:8000
```

Apoi în browser: **http://localhost:8000/ocupate.php**

---

## 📦 Ce e diferit?

✅ **SQLite** în loc de MySQL  
✅ **Nicio instalație** necesară  
✅ **Baza de date creată automat** (pandabooth.db)  
✅ **O comandă și gata!**

---

## 📝 Cum folosești

1. Adaugă date ocupate prin formular
2. Vezi lista în timp real
3. Datele se salvează automat în **pandabooth.db**

---

## 🛑 Cum oprești serverul

- Apasă **CTRL+C** în terminal
- Sau închide fereastra cmd

---

## ❓ Probleme?

**Portul ocupat?** (8000 deja folosit)
```powershell
php -S localhost:8001
```
(sau 8002, 8003, etc)

**SPécific să-mi dai eroare exactă, și o fix!** 🔧

---

## 📂 Fișiere importante

- `ocupate.php` - Paginul principal
- `pandabooth.db` - Baza de date SQLite (se creează automat)
- `start-server.bat` - Script pentru a porni serverul
- `test.php` - Test conexiune (acum cu SQLite)

Asta e! Mult mai simplu fără XAMPP! 🎯
