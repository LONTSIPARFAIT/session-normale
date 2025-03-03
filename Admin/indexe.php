<?php 
require_once '../db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Gestion des Groupes</h1>
    <input type="text" placeholder="Nom du groupe"><br><br>
    <a href="./addgroup.php">Ajouter un groupe</a>

    <h3>Associer un menbre a un groupe</h3>
    <select name="" id="">
        <option value="">Selectionner un menbre</option>
    </select><br><br>
    <select name="" id="">
        <option value="">Selectionner un groupe</option>
    </select><br><br>
    <a href="">Associer un membre</a>

    <h3>LIste des groupes</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td></td>
                <td>
                    <a href="./edit.php">Editer</a> | <a href="./delete.php">Supprimer</a> | <a href="./view.php">Voir Membre</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>