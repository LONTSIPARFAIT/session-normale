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
if (!$groupe) {
    $message = "<p class='error'>Groupe non trouvé.</p>"; // Message d'erreur si le groupe n'existe pas
} else {
    // Traiter le formulaire si soumis
    if (isset($_POST['update'])) {
        $nom = trim($_POST['nom']); // Récupérer et nettoyer le nom

        // Validation : vérifier si le champ est vide
        if (empty($nom)) {
            $message = "<p class='error'>Veuillez remplir tous les champs.</p>"; // Message d'erreur si vide
        } else {
            // Mettre à jour le groupe dans la base de données
            $sql = "UPDATE `groupe` SET `nom` = ? WHERE `id` = ?";
            $stmt = $pdo->prepare($sql); // Préparer la requête
            if ($stmt->execute([$nom, $id])) { // Exécuter la requête
                // Rediriger vers la liste des groupes après la mise à jour
                header('Location: indexe.php');
                exit; // Terminer le script
            } else {
                $message = "<p class='error'>Erreur lors de la mise à jour du groupe.</p>"; // Message d'erreur en cas d'échec
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer le Groupe</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <h1>Éditer le Groupe</h1>

    <!-- Affichage du message d'état (erreur ou succès) -->
    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form action="" method="post"> <!-- Formulaire pour mettre à jour le groupe -->
        Nom : <input type="text" name="nom" value="<?= htmlspecialchars($groupe['nom']) ?>" placeholder="Nom"><br><br>
        <input type="submit" name="update" value="Mettre à jour"> <!-- Bouton de soumission -->
    </form>

    <a class="lien" href="./indexe.php">Retour</a> <!-- Lien pour revenir à la page d'index -->
</body>
</html>