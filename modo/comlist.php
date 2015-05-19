<?php include("../doctype.php");
if(isset($_SESSION['groupe']))
{
    if($_SESSION['groupe'] != "administrateur" AND $_SESSION['groupe'] != "moderateur")
    {
        header('Location: ../index');
        exit();
    }
}
else
{
    header('Location: ../index');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panneau de modération</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Panneau de modération du site</h1>
            <p>Panneau de modération du site</p>
        </div>
        <?php include("../nav.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <h2><span class="glyphicon glyphicon-comment"></span> Commentaires</h2>
                <?php
                //selecting comments
                $req_commentaire = $bdd->query('SELECT * FROM comnews');
                while ($donnees = $req_commentaire->fetch())
                {
                    ?>
                    <div class="panel panel-default">

                        <?php
                        //getting comment autor informations
                        $req_auteur_com = $bdd->prepare('SELECT * FROM user WHERE id = :id');
                        $req_auteur_com->execute(array(
                            'id' => $donnees['id_auteur']
                        ));

                        //display it
                        while ($donnees_autor = $req_auteur_com->fetch())
                        {
                            ?>
                            <!-- comment autor -->
                            <div class="panel-heading">
                                <img class="img-responsive" src="<?php echo gravatarUrl($donnees_autor['gravatar'], '50'); ?>" alt="Avatar de l'auteur">
                                <?php echo userBadge($donnees_autor['groupe']); ?>
                                <a href="profil?user=<?php echo $donnees_autor['pseudo']; ?>"><?php echo $donnees_autor['pseudo']; ?></a>
                                <div style="text-align:right;">#<?php echo $donnees['id'] . ' ' . $donnees['date']; ?></div>
                                <?php

                                //moderator and administrator display link
                                if(isset($_SESSION['groupe']))
                                {
                                    if($_SESSION['groupe'] == "administrateur" OR $_SESSION['groupe'] == "moderateur")
                                    {
                                        if($donnees['epingle'])
                                        {
                                            echo '<br/><a href="comepingle?id=' . $donnees['id'] . '&action=unepingle" target="_blank"><span class="glyphicon glyphicon-asterisk"></span> Désépingler</a>';
                                        }
                                        else
                                        {
                                            echo '<br/><a href="comepingle?id=' . $donnees['id'] . '&action=epingle" target="_blank"><span class="glyphicon glyphicon-pushpin"></span> Epingler</a>';
                                        }
                                        echo '<br/><a href="comdelete?id=' . $donnees['id'] . '" target="_blank"><span class="glyphicon glyphicon-trash"></span> Supprimer</a>';
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        $req_auteur_com->closeCursor();
                        ?>

                        <!-- Comment core -->
                        <div class="panel-body">
                            <?php
                            echo tercode($donnees['contenu']);
                            ?>
                        </div>
                    </div>
                    <?php
                }
                $req_commentaire->closeCursor();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
