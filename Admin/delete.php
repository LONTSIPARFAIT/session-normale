<?php 
// Inclusion du fichier de configuration de la base de données
require_once '../db.php';

// Initialisation d'une variable pour stocker les messages
$message = '';

// Vérification si un identifiant de groupe a été passé dans l'URL
if (isset($_GET['id'])) {
    // Conversion de l'ID en entier pour éviter les injections SQL
    $id = intval($_GET['id']); 

     // Préparation de la requête SQL pour supprimer le groupe avec l'ID spécifié
     $sql = "DELETE FROM `groupe` WHERE `id` = ?";
}