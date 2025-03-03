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
    $req_delete = $pdo->prepare($sql);

    // Exécution de la requête de suppression
    if ($req_delete->execute([$id])) {
        // Message de succès si la suppression a réussi
        $message = "<p class='success'>Groupe supprimé avec succès.</p>";
    } else {
        // Message d'erreur si la suppression a échoué
        $message = "<p class='error'>Erreur lors de la suppression du groupe.</p>";
    }
} else {
    // Message d'erreur si l'ID du groupe n'est pas spécifié dans l'URL
    $message = "<p class='error'>ID du groupe non spécifié.</p>";
}

?>