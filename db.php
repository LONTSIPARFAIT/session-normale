<?php 

$dsn = 'mysql:host=localhost;dbname=session-normale;charset=utf8';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    
} catch(PDOException $e) {
    echo 'Une erreur est survenue : '.$e->getMessage();
}