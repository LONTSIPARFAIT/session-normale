<?php 
require_once './db.php';


$sql = "SELECT * FROM utilisateurs WHERE id=?";
$eq_select = $pdo->prepare($sql);
$var_clientID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$eq_select->execute([$var_clientID]);
$donnees = $eq_select->fetch(PDO::FETCH_ASSOC);

$pseudo = $donnees['pseudo'] ?? "";
$email = $donnees['email'] ?? "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    <h1>Profil de <?php $pseudo ?> </h1>
    <img src="" alt="Mon profil">
    <p>Pseudo <?php $pseudo ?></p>
    <p>Mail <?php $email ?></p>

    <div class="">
        <a href="./editer-profil.php">Editer mon Profil</a>
        <a href="./deconnexion.php">Se Deconnecter</a>
        <a href="./Admin/indexe.php">Admin</a>
    </div>
</body>
</html>