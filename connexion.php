<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="utf-8" />
    <title> Chambre </title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>



<body>


<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=hotels;charset=utf8', 'root', 'toro');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>

<div class="logo">
    <img src="image/logo.png">
</div>

<div id="container">

    <form action="#" method="POST">
        <h1>Connexion</h1>

        <input type="email" placeholder="Entrer votre email" name="email" required>

        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='Se connecter'> <a href="chambres.php"></a>
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Email ou mot de passe incorrect</p>";
        }
        ?>
    </form>
</div>
</body>
</html>
    </form>





</body>
</html>
