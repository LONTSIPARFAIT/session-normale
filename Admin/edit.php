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
} else {
    // Traiter le formulaire si soumis
    if (isset($_POST['update'])) {
        $nom = trim($_POST['nom']);
        
        // Validation
        if (empty($nom)) {
            $message = "<p class='error'>Veuillez remplir tous les champs.</p>";
        } else {
            // Mettre à jour le groupe dans la base de données
            $sql = "UPDATE `groupe` SET `nom` = ? WHERE `id` = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nom, $id])) {
                // Rediriger vers la liste des groupes après la mise à jour
                header('Location: indexe.php');
                exit;
            } else {
                $message = "<p class='error'>Erreur lors de la mise à jour du groupe.</p>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Éditer le Groupe</h1>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form action="" method="post">
        Nom : <input type="text" name="nom" value="<?= htmlspecialchars($groupe['nom']) ?>" placeholder="Nom"><br><br>
        <input type="submit" name="update" value="Mettre à jour">
    </form>

    <a class="lien" href="./indexe.php">Retour</a>
</body>
</html>