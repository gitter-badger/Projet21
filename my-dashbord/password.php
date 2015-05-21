<?php include("../doctype.php");
if(!$connecte)
{
    header('Location: ../index');
    exit();
}

//form verification
if(!isset($_POST['password']) OR !isset($_POST['passwordverification']))
{
    //if form is empty
    header('Location: index');
    exit();
}
else
{
    $password = htmlspecialchars($_POST['password']);
    $passwordverification = htmlspecialchars($_POST['passwordverification']);
}


if($password == $passwordverification)
{
    $password_correspondance = true;
    //is password correct ? (6 character minimum)
    if (preg_match("#^[a-zA-Z0-9]{6,}$#", $password))
    {
        //if password is correct
        $correct = true;
        $password_correct = true;
    }
    else
    {
        //if password is incorrect
        $correct = false;
        $password_correct = false;
    }

}
else
{
    //if password != passwordverification
    $correct = false;
    $password_correspondance = false;
    $password_correct = false;
}

//if password is correct, update db informations
if($correct)
{
    $password_hash = md5($password);
    $request = $bdd->prepare('UPDATE user SET password = :password WHERE id= :id');
    $request->execute(array(
        'password' => $password_hash,
        'id' => $_SESSION['id']
    ));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mot de passe</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <?php
        if($correct)
        {
            ?>
            <div class="alert alert-success" role="alert"><span class="label label-success">Réussi</span> Votre mot de passe a correctement été mis a jour</div>
            <?php
        }
        elseif(!$password_correct)
        {
            ?>
            <div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> Le mot de passe doit faire au moins 6 caractères et ne contenir que des chiffres et lettres</div>
            <?php
        }
        elseif(!$password_correspondance)
        {
            ?>
            <div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> Les mots de passe ne correspondent pas</div>
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> Une erreur est survenue. Veuillez réseayer, les mots de passe doivent faire au moins 6 caractères de long et ne contenir ques des lettres et chiffes</div>
            <?php
        }
        ?>
    </div>
    <?php include("../nav.php") ?>
</div>
</body>
</html>
