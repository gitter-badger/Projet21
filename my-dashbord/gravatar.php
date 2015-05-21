<?php
include("../doctype.php");
if(!$connecte)
{
    header('Location: ../index');
    exit();
}

//form verification
if(!isset($_POST['email']))
{
    //if form is empty
    header('Location: index');
    exit();
}
else
{
    $email = htmlspecialchars($_POST['email']);
}

if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $email))
{
    $correct = true;
    $request = $bdd->prepare('UPDATE user SET gravatar = :email WHERE id= :id');
    $request->execute(array(
        'email' => $email,
        'id' => $_SESSION['id']
    ));
}
else
{
    $correct = false;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Adresse email gravatar</title>
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
            <div class="alert alert-success" role="alert"><span class="label label-success">Réussi</span> email gravatar a correctement été mis a jour</div>
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> L'adresse email gravatar n'est pas valide</div>
        <?php
        }
        ?>
    </div>
    <?php include("../nav.php") ?>
</div>
</body>
</html>
