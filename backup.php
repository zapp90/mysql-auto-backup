<?php
$config = require 'config.php';

if (!is_dir($config['backup_dir'])) {
    mkdir($config['backup_dir'], 0777, true);
}

foreach ($config['databases'] as $db) {
    $timestamp = date('Ymd_His');
    $filename = "{$db}_{$timestamp}.sql";
    $filepath = "{$config['backup_dir']}/{$filename}";

    $cmd = "mysqldump -h {$config['db_host']} -u {$config['db_user']} "
         . (!empty($config['db_pass']) ? "-p{$config['db_pass']} " : '')
         . "{$db} > {$filepath}";

    echo "⏳ Backing up {$db}...\n";
    exec($cmd, $output, $result);

    if ($result === 0) {
        if ($config['compress']) {
            $gzPath = "{$filepath}.gz";
            exec("gzip {$filepath}");
            echo "✅ Saved: {$gzPath}\n";
        } else {
            echo "✅ Saved: {$filepath}\n";
        }
    } else {
        echo "❌ Error backing up {$db}\n";
    }
}
