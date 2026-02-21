<?php 
$host = "localhost"; 
$db = "php"; 
$user = "root"; 
$password = ""; 

$dsn = "mysql:host=$host;dbname=$db";

try {
   $pdo = new PDO ($dsn, $user, $password); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
