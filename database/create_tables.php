<?php

$sql = file_get_contents(__DIR__ . '/tables.sql');

$pdo = require __DIR__ . '/../config/createDbConn.php';

$reCreateDatabase = readline('Do you want to re-create your database? [no] ');

if ($reCreateDatabase === 'yes') {
    $pdo->exec('DROP DATABASE module_3_project;');
}

$pdo->exec($sql);
echo 'Tables created! :)';