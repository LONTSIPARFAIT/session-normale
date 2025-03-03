<?php  
require_once "./db.php"; 

// $errors = '';
$message = '';

function clean_input($data){
  return  htmlspecialchars(stripcslashes(trim($data)));
}

if (isset($_POST['register'])) {

  $pseudo = clean_input($_POST['pseudo']);
  $email = clean_input($_POST['email']);
  $password = clean_input($_POST['password']);

  if ((empty($pseudo)) || (empty($email)) || (empty($password)) ) {
     $message = "<p class='error'> Veuillez remplir tous les champs</p>";
  }
else {
    $req_email = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
    $req_email->execute([$email]);
    $email_exists = $req_email->fetchColumn();

    if ($email_exists) {
      $message = "<p class='error'>L'adresse e-mail est déjà utilisée</p>";
  } else {

    $req_insert = $pdo->prepare("INSERT INTO `utilisateurs`(`pseudo`, `email`, `password`) VALUES (?,?,?) ");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if(empty($_POST['password']) ){
        $message['password'] = 'Vous devez entrez un mots de passe';
      }else if($_POST['password'] !== $_POST['confirm_password']){
        $message['password'] = 'Votre mot de passe ne correspond pas';
      }

    $req_insert->execute([$pseudo,$email,$password]);
  
    header('Location: index.php');
    exit;
  }
  
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<div class="">
  <div class="">
    <div class="">
        <h2>Inscription</h2>
    </div>

    <form action="" method="post" >
      <div class="">
        <?php $message ?>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" placeholder="votre pseudo" name="pseudo">

      </div>

      <div class="">
      <?php $message ?>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" placeholder="votre mail" name="email" >
      </div>

      <div class="">
      <?php $message ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password">

      </div>

      <div class="">
      <?php $message='Mot de passe ne correspond pas' ?>
        <label for="confirm_password">Confirmation Mot de passe</label><br>
        <input type="password" id="confirm_password" name="confirm_password">

      </div><br>
            

      <button name="register" type="submit"> S'inscrire</button>

    </form>

  </div>
</div>
</body>
</html>
