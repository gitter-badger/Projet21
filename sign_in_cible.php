<?php
include("doctype.php");

if($connecte)
{
    header('Location: index');
    exit();
}

//form verification
if(isset($_POST['pseudo']) AND isset($_POST['password']))
{
    //form htmlspecialchars
    $connexion_pseudo = htmlspecialchars($_POST['pseudo']);
    $connexion_pseudo = strtolower($connexion_pseudo);
    $connexion_password = htmlspecialchars($_POST['password']);
    $connexion_pseudo_match = false;

    //get user information
    $connexion = $bdd->prepare('SELECT * FROM user WHERE pseudo_min = :pseudo');
    $connexion->execute(array('pseudo' => $connexion_pseudo));

    while ($data = $connexion->fetch())
    {
        $connexion_pseudo_match = true; //pseudo finded
        if(md5($connexion_password) == $data['password']) //password verification
        {
            //creationg session variables
            $connexion_ok = true;
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['groupe'] = $data['groupe'];
            $_SESSION['gravatar'] = $data['gravatar'];
            $_SESSION['id'] = $data['id'];
        }
        else
        {
            $connexion_ok = false;
        }
    }
    $connexion->closeCursor();

}
else
{
    $connexion_pseudo_match = false;
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
            <?php
            if($connexion_pseudo_match)
            {
                if($connexion_ok)
                {
                    ?>
                    <h1>Vous êtes connecté</h1></p>
                    <p><div class="alert alert-success" role="alert"><p><span class="label label-success">Succès</span> Vous avez correctement été connecté !</div></p>
                    <?php
                    $connecte = true;
                }
                else
                {
                    //password error
                    ?>
                    <h1>Vous n'avez pas été connecté</h1>
                    <p><div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> Le mot de passe ou le pseudo ne correspond pas</div></p>
                    <?php
                }
            }
            else
            {
                //pseudo error
                ?>
                <h1>Vous n'avez pas été connecté</h1>
                <p><div class="alert alert-danger" role="alert"><span class="label label-danger">Erreur</span> Le mot de passe ou le pseudo ne correspond pas</div></p>
                <?php
            }
            ?>
        </div>
        <?php include("nav.php") ?>
    </div>
</body>
</html>
