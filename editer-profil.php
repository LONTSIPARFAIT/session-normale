<?php
require_once './db.php';

$message='';
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $eq_select = $pdo->prepare("SELECT * FROM utilisateurs WHERE id=?");
    $var_clientID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $eq_select->execute([$var_clientID]);
    $donnees = $eq_select->fetch(PDO::FETCH_ASSOC);

    $pseudo = $donnees['pseudo'] ?? "";
    $email = $donnees['email'] ?? "";
}

function clean_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['update'])) {

    $var_pseudo = clean_input(filter_input(INPUT_POST, 'pseudo', FILTER_DEFAULT));
    $var_email = clean_input(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
    $var_clientID = clean_input(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));

    if (empty($var_pseudo) || empty($var_email)) {
        $message = "<p> Veuillez remplir tous les champs du formulaire !</p>";
    } else {

        $eq_modif = $pdo->prepare("UPDATE utilisateur SET  pseudo=?, email=? WHERE id=?");

        $eq_modif->execute([$var_pseudo, $var_email, $var_clientID]);

        $message = "<p> Profil modifié avec success</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer mon profil</title>
</head>
<body>
<div class="">
  <div class="">
    <div class="">
        <h2>Edite mon profil</h2>
    </div>

    <form action="" method="post" >
    <input type="hidden" name="id" value="<?= $id['id']; ?>"><br>
      <div class="">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" value="<?= $pseudo; ?>" placeholder="votre pseudo" name="pseudo">

      </div><br>

      <div class="">
        <label for="email">E-mail</label><br>
        <input type="email" value="<?= $email; ?>" placeholder="votre mail" name="email" >
      </div><br>

      <div class="">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password">

      </div><br>

      <div class="">
        <label for="confirm_password">Confirmation Mot de passe</label><br>
        <input type="password" id="confirm_password" name="confirm_password">

      </div><br>

      <div class="">
        <label for="file">Avatar</label><br>
        <input type="file" name="file">

      </div><br>
            

      <input type="submit" name="update" value="Mettre à jour mon Profil">
      <!-- <button name="update" type="submit"> Mettre à jour mon Profil</button> -->
    </form>
    
  </div>
</div>
</body>
</html>