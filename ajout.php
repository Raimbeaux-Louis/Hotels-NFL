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
if(isset($_POST['user_firstnane'],$_POST['user_name'])){
    if(empty($_POST['user_mane'])){
        echo "Le champ nom est vide.";
    }
    elseif(empty($_POST['user_firstnane'])){
        echo "Le champ prenom est vide.";
    }
    else {
        if ($_POST) {

            $request = $bdd->prepare('INSERT INTO user (user_firstnane, user_name) VALUES (?,?)');
            $request->execute(array(htmlspecialchars($_POST['user_firstnane']), htmlspecialchars($_POST['user_name'])));
        }
    }
}




?>

<div class="text">
    <header>
        <nav>


            <ul>

                <li><img src="image/logo.png" width="65px" height="65px"></li>
                <li><a href="chambres.php">Chambres</a></li>
                <li><a href="personnel.php">Personnel</a></li>
                <li><a href="connexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>
</div>

<div id="container">
<form action="" method="POST">
    <h2> Ajouter un collaborateur </h2> <br>

    <label for="nom">Nom </label> <br>
    <input id="nom" type="text" name="nom"> <br> <br>

    <label for="prenom">Prénom </label> <br>
    <input type="text" id="prenom" name="prenom"> <br> <br>

    <button type="submit"> Enregistrer</button>

</form>
</div>
</body>
</html>