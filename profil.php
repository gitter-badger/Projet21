<?php
include("doctype.php");
if(empty($_GET['user']))
{
    header('Location: index');
    exit();
}

//inititalisation des variables
$pseudo = NULL;
$groupe = NULL;
$gravatar = NULL;
$id = NULL;

//on séléctionne l'utilsateur
$req = $bdd->prepare('SELECT * FROM user WHERE pseudo_min = :pseudo');
$req->execute(array(
    'pseudo' => strtolower(htmlspecialchars($_GET['user']))
    ));

//on récupère les infos de l'utilisateur
while ($donnees = $req->fetch())
{
    $pseudo = $donnees['pseudo'];
    $groupe = $donnees['groupe'];
    $gravatar = $donnees['gravatar'];
    $id = $donnees['id'];
    $bio = $donnees['bio'];
}


$req->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil de <?php echo $pseudo; ?></title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>
    
    <style>
    <?php
    if($groupe == "administrateur")
    {
        ?>
        body
        {
            background-color: #f2dede;
        }
        <?php
    }
    elseif($groupe == "moderateur")
    {
        ?>
        body
        {
            background-color: #d9edf7;
        }
        <?php
    }
    elseif($groupe == "vip")
    {
        ?>
        body
        {
            background-color: #dff0d8;
        }
        <?php
    }
    ?>
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>
                Profil de <?php echo $pseudo; ?>
            </h1>
        </div>
        <?php include("nav.php") ?>
        <?php
        //si aucun utilisateur n'a été trouvé
        if($pseudo == NULL)
        {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Erreur</strong>, l'utilisateur n'a pas été trouvé
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-1">
                <p>
                    <?php
                    echo '<img src="' . gravatarUrl($gravatar) .'" alt="avatar" class="img-responsive" />';
                    ?>
                </p>
            </div>
            <div class="col-md-4">
                Nom d'utilisateur : <?php
                //affichage badge
                echo userBadge($groupe);
                echo $pseudo;
                ?>
                <br/>
                Groupe : <?php echo $groupe; ?><br/>
                ID Utilisateur : <?php echo $id; ?>
            </div>
            <div class="col-md-7">
                <h4>Bio de l'utilisateur : </h4>
                <?php echo tercode($bio); ?>
            </div>
        </div>
    </div>
</body>
</html>
