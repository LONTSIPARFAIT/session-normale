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
