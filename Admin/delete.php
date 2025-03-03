<?php 
// Inclusion du fichier de configuration de la base de données
require_once '../db.php';

// Initialisation d'une variable pour stocker les messages
$message = '';

// Vérification si un identifiant de groupe a été passé dans l'URL
if (isset($_GET['id'])) {
    // Conversion de l'ID en entier pour éviter les injections SQL
}