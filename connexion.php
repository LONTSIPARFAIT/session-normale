<?php  
require_once './db.php';





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="post">
        <label for="">E-mail</label><br>
        <input type="email" placeholder="votre mail"><br><br>
        <label for="">Password</label><br>
        <input type="password" ><br><br>
        <input type="submit" value="Se connecter">
        <!-- <button type="submit">Se cennecte</button> -->
    </form>
    <p>Vous n'avez pas encore un compte ? <a href="./inscription.php">Je m'inscris</a></p>
</body>
</html>