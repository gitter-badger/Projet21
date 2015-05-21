<?php include("../doctype.php");
if(!$connecte)
{
    header('Location: ../index');
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
    'pseudo' => $_SESSION['pseudo']
));

//on récupère les infos de l'utilisateur
while ($donnees = $req->fetch())
{
    $pseudo = $donnees['pseudo'];
    $groupe = $donnees['groupe'];
    $gravatar = $donnees['gravatar'];
    $id = $donnees['id'];
    $bio = $donnees['bio'];
    $email = $donnees['email'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Projet 21</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Paramètres</h1>
            <p>Personnaliser vos paramètres</p>
        </div>
        <?php include("../nav.php"); ?>
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
                ID Utilisateur : <?php echo $id; ?><br />
                Votre email : <?php echo $email; ?><br />
                Votre email gravatar : <?php echo $gravatar; ?>
            </div>
            <div class="col-md-7">
                <h4>Bio de l'utilisateur : </h4>
                <?php echo tercode($bio); ?>
            </div>
        </div>

        <!-- formulaires -->
        <div class="row">

            <!-- formulaire mot de passe -->
            <div class="col-md-3">
                <form class="form-horizontal" method="post" action="password">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Modifier votre mot de passe</legend>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="control-label" for="password">Mot de passe</label>
                            <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="control-label" for="passwordverification">Vérification du mot de passe</label>
                            <input id="passwordverification" name="passwordverification" type="password" class="form-control input-md" required="">
                            <span class="help-block">Retapez votre mot de passe</span>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <button id="singlebutton" name="singlebutton" class="btn btn-danger">Changer mon mot de passe</button>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
