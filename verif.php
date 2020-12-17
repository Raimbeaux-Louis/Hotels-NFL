<?php
session_start();
if(isset($_POST['email']) && isset($_POST['user_password']))
{

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=hotels;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_password']));

    $req = $bdd->prepare('SELECT hotels (email, user_password) VALUES(?, ?)');
    $req->execute(array($_POST['email'], $_POST['user_password']));

    if($username !== "" && $password !== "")
    {
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['username'] = $username;
            header('Location: chambres.php');
        }
        else
        {
            header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
        header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
    header('Location: chambres.php');
}

?>

}
