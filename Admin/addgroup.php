<?php 
require_once '../db.php';
$message = '';

function clean_input($data){

  return  htmlspecialchars(stripcslashes(trim($data)));
}

if (isset($_POST['create'])) {

  $nom = clean_input($_POST['nom']);
  if ((empty($nom)) ) {
     $message = "<p class='error'> Veuillez remplir tous les champs</p>";
  }else {

    $sql = "INSERT INTO `groupe`(`nom`) VALUES (?) " ;

    $req_insert = $pdo->prepare($sql);

    $req_insert->execute([$nom]);
 

    header('Location: indexe.php');
    exit;
  
  
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un nouveau Groupe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Créer</h1>

  <form action="" method="post">
   Nom : <input type="text" name="nom" placeholder="Nom"><br><br>
    <input type="submit" name="create" value="Créer">
  </form>

  <a class="lien" href="./indexe.php">Retour</a>
</body>
</html>