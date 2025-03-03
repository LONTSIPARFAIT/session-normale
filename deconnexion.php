<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Détruire la session pour déconnecter l'utilisateur
    session_unset(); // Libère toutes les variables de session
    session_destroy(); // Détruit la session
}

// Rediriger vers la page d'inscription ou de connexion
header('Location: inscription.php');
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>
<body>
<?php 
// Le code PHP de déconnexion ici
require './db.php';
session_start();

if (isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
}

header('Location: inscription.php');
exit;
?>
</body>
</html>