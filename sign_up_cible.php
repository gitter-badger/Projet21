<?php
include("doctype.php");

//if user is aleready connected we don't want to sign up
if($connecte)
{
    header('Location: index');
    exit();
}

//is form not empty
if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']))
{
    $pseudo_match = false;
    $password_correct = false;
    //securisation using htmlspecialchars
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gravatar = htmlspecialchars($_POST['gravatar']);
    $pseudo_min = strtolower($pseudo);

    //is pseudo correct ?
    if (preg_match("#^[a-zA-Z0-9]{3,12}$#", $pseudo))
    {
        $correct = true;
        $pseudo_correct = true;

        //is email correct ?
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $email))
        {
            $correct = true;
            $email_correct = true;

            //is password correct ? (6 character minimum)
            if (preg_match("#^[a-zA-Z0-9]{6,}$#", $password))
            {
                $correct = true;
                $password_correct = true;
            }
            else
            {
                $password_correct = false;
                $correct = false;
            }
        }

        else
        {
            $email_correct = false;
            $correct = false;
        }
    }
    else
    {
        $pseudo_correct = false;
        $correct = false;
    }


    //if form information is correct
    if($correct)
    {
        //is psedo avalaible ?

        $req = $bdd->prepare('SELECT * FROM user WHERE pseudo_min = :pseudo');
        $req->execute(array('pseudo' => $pseudo_min));

        while ($donnees = $req->fetch())
        {
            $pseudo_match = true;
            $correct = false;
        }
        $req->closeCursor();
    }

    //if admin want captcha
    if($settingsUseReCaptchaSignUp)
    {
        //captcha verificatio,
        $captcha_valid = captchaIsValid($_POST['g-recaptcha-response'], $settingsReCaptchaPrivateKey);
        if(!$captcha_valid)
        {
            //if captcha is invalid
            $correct = false;
        }
    }

    //account creation if informations are correct
    if($correct)
    {
        //variable creation
        $password_hash = md5($password); //hash of password
        $groupe = "utilisateur"; //default group (user)

        if(!$settingsDevMode)
        {
            //if admin has not set dev mod, no crypted password will not be stocked in database
            $password = "empty";
        }

        //data creation in database using PDO
        $insert = $bdd->prepare('INSERT INTO user(pseudo, pseudo_min, password, password_clair, email, gravatar, groupe, date_inscription) VALUES(:pseudo, :pseudo_min, :password, :password_clair, :email, :gravatar, :groupe, :date)');
        $insert->execute(array(
            'pseudo' => $pseudo,
            'pseudo_min' => $pseudo_min,
            'password' => $password_hash,
            'password_clair' => $password,
            'email' => $email,
            'gravatar' => $gravatar,
            'groupe' => $groupe,
			'date' => $date_now
        ));
        $insert->closeCursor();

    }

}
else
{
    $correct = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>

</head>
<body>
    <div class="container">
        <?php include("nav.php") ?>
        <div class="col-md-12">
            <?php
            //display status message
            if($correct)
            {
                //correct creation message
                ?>
                <div class="alert alert-success" role="alert">Vous avez correctement été inscrit ! Vous pouvez maintenant vous connecter. </div>
                <?php
            }

            //invalid captcha message
            elseif (!$captcha_valid)
            {
                ?>
                <div class="alert alert-warning" role="alert">Votre inscription n'a pas pu aboutir : le captcha n'a pas été rempli ou est invalide</div>
                <?php
            }

            //invalid pseudo
            elseif (!$pseudo_correct)
            {
                ?>
                <div class="alert alert-warning" role="alert">Votre inscription n'a pas pu aboutir : le pseudo ne doit contenir que des chiffres et des lettres, sans espace et doit faire entre 3 et 12 caractères</div>
                <?php
            }

            //pseudo already taken
            elseif ($pseudo_match)
            {
                ?>
                <div class="alert alert-warning" role="alert">Votre inscription n'a pas pu aboutir : le pseudo est déjà pris</div>
                <?php
            }

            //invalid password
            elseif (!$password_correct)
            {
                ?>
                <div class="alert alert-warning" role="alert">Votre inscription n'a pas pu aboutir : le mot de passe doit faire plus de 6 caractères et ne contenir que des lettres, chiffres sans espace</div>
                <?php
            }

            //email invalid
            elseif (!$email_correct)
            {
                ?>
                <div class="alert alert-warning" role="alert">Votre inscription n'a pas pu aboutir : l'adresse email est invalide</div>
                <?php
            }

            else
            {
                //other error
                ?>
                <div class="alert alert-danger" role="alert">Vous n'avez pas correctement rempli le formulaire !</div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
