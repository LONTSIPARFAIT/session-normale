<?php 
// Inclusion du fichier de configuration de la base de données
require_once '../db.php';

$message = ''; // Variable pour stocker les messages d'état
$id = intval($_GET['id']); // Récupérer l'ID du groupe à éditer, en s'assurant qu'il s'agit d'un entier