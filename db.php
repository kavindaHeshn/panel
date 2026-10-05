<?php
// db.php

$host = 'localhost';
$dbname = 'panel_wiring_db';
$username = 'root';      // ඔයාගේ username
$password = '';          // ඔයාගේ password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>