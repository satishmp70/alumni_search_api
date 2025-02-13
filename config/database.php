<?php
require_once __DIR__ . '/../vendor/autoload.php';

$db = new MysqliDb('localhost', 'root', '', 'alumni');

if ($db->getLastErrno()) {
    die("Database connection failed: " . $db->getLastError());
}
?>