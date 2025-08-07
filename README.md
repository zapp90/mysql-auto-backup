# 🛡️ MySQL Auto Backup (PHP CLI)

A simple, lightweight PHP command-line tool to automate backups of one or more MySQL databases.

---

## ✅ Features

- Backup multiple databases in `.sql` format
- Optional compression to `.sql.gz`
- CRON-ready
- Fast, clean, and portable

---

## 🚀 How to Use

1. Clone this repo
2. Edit `config.php` with your DB credentials and database list
3. Run from terminal:

```bash
php backup.php
```

---

## ⚙️ Configuration

Edit `config.php`:

```php
return [
  'db_host'    => 'localhost',
  'db_user'    => 'root',
  'db_pass'    => '',
  'databases'  => ['your_db1', 'your_db2'],
  'backup_dir' => __DIR__ . '/backups',
  'compress'   => true
];
```

---

## 🗓️ CRON Example

Run daily at 3AM:

```bash
0 3 * * * /usr/bin/php /path/to/backup.php
```

---

## 📁 Output

Backups are saved to `backups/` with timestamped filenames:

- `your_db1_20250807_030000.sql.gz`

---

## 🛠️ Requirements

- PHP CLI installed
- `mysqldump` command available in your path

---

## 📝 License

MIT — use freely.
