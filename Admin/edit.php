<?php 
require_once '../db.php';

$message = '';
$id = intval($_GET['id']); // Récupérer l'ID du groupe à éditer

// Vérifier si le groupe existe
$sql = "SELECT * FROM `groupe` WHERE `id` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$groupe = $stmt->fetch();

if (!$groupe) {
    $message = "<p class='error'>Groupe non trouvé.</p>";
} 
