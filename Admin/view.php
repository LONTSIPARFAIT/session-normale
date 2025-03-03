<?php 
// Inclusion du fichier de configuration de la base de données
require_once '../db.php';

$message = ''; // Variable pour stocker les messages d'état
$id = intval($_GET['id']); // Récupérer l'ID du groupe à éditer, en s'assurant qu'il s'agit d'un entier

// Vérifier si le groupe existe dans la base de données
$sql = "SELECT * FROM `groupe` WHERE `id` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$groupe = $stmt->fetch(); // Récupérer les détails du groupe

// Vérifier si le groupe a été trouvé