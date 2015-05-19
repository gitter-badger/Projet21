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

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>S'inscrire</h1>
            <p>Inscrivez vous</p>
        </div>
        <?php include("nav.php") ?>
        <div class="col-md-12">
            <form method="post" action="sign_up_cible">
                Pseudo : <input type="text" name="pseudo" placeholder="exemple" class="form-control">
                Adresse email : <input type="text" name="email" placeholder="me@exemple.org" class="form-control">
                Mot de passe : <input type="password" name="password" placeholder="azerty" class="form-control">
                Email de votre email <a href="https://fr.gravatar.com/" target="_blank">gravatar</a> (nous n'utiliserons pas cette adresse email a des fins de contact) : <input type="text" name="gravatar" placeholder="facultatif" class="form-control">
                <?php
                if($settingsUseReCaptchaSignUp)
                {
                    //if admin want a sign up captcha
                    echo '<br />';
                    echo captchaGet($settingsReCaptchaPublicKey);
                    echo '<br />';
                }
                ?>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</body>
</html>
