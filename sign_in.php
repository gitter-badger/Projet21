<?php
include("doctype.php");

if($connecte)
{
    header('Location: index');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>
    
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Se connecter</h1>
            <p>Connexion</p>
        </div>
        <?php include("nav.php") ?>
        <div class="col-md-12">
            <form method="post" action="sign_in_cible">
                Pseudo : <input type="text" name="pseudo" placeholder="exemple" class="form-control">
                Mot de passe : <input type="password" name="password" placeholder="azerty" class="form-control">
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</body>
</html>
