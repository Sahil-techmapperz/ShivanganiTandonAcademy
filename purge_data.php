<?php
// Truncate tables to remove demo data
// Actually, I can just use a simple PHP script that connects to PDO.

$host = 'localhost';
$db   = 'shivanganitandonacademy';
$user = 'root';
$pass = 'Techm@123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     $pdo->exec("TRUNCATE TABLE tbl_results");
     $pdo->exec("TRUNCATE TABLE tbl_exam_submissions");
     echo "Data purged successfully.\n";
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
