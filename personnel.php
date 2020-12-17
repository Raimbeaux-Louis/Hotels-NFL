<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="utf-8" />
    <title> Ajout_collaborateur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=hotels;charset=utf8', 'root', 'root');

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
if(isset($_POST['user_'],$_POST['email'],$_POST['password'])){
    if(empty($_POST['pseudo'])){
        echo "Le champ Pseudo est vide.";
    }
    elseif(empty($_POST['email'])){
        echo "Le champ email.";
    }
    elseif(empty($_POST['password'])){
        echo "Le champ password.";
    }

    else {
        if ($_POST) {

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $request = $bdd->prepare('INSERT INTO user (pseudo, email, password) VALUES (?, ?, ?)');
            $request->execute(array(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['email']),$password));
        }
    }
}
$request = $bdd->prepare('INSERT INTO user (user_firstname, user_name) VALUES (?, ?)');
$request->execute(array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom'])));



?>

<form action="" method="POST">
    <h2> Ajout un collaborateur </h2>

    <label for="nom">Nom:</label> <br>
    <input id="nom" type="text" name="nom"> <br>

    <label for="prenom">Prénom :</label> <br>
    <input type="text" id="prenom" name="prenom"> <br>

    <button type="submit"> Enregistrer</button>

</form>
</body>
</html>