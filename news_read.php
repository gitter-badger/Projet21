<?php include("doctype.php");
if(empty($_GET['id']))
{
    header('Location: index');
    exit();
}

//select news
$req_news = $bdd->prepare('SELECT * FROM news WHERE id = :id');
$req_news->execute(array(
    'id' => strtolower($_GET['id'])
));

$news_match = false;

//get news
while ($donnees = $req_news->fetch())
{
    $id_auteur = $donnees['id_auteur'];
    $titre = $donnees['titre'];
    $date = $donnees['date'];
    $image = $donnees['image'];
    $contenu = $donnees['contenu'];
    $news_match = true;
}

if(!$news_match)
{
    header('Location: news');
    exit();
}

$req_news->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
    <title>News : <?php echo $titre; ?></title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1><?php echo $titre; ?></h1>
            <p><img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $titre; ?>"></p>

            <p><?php
            //get autor informations
            $req_auteur = $bdd->prepare('SELECT * FROM user WHERE id = :id');
            $req_auteur->execute(array(
                'id' => $id_auteur
            ));

            //displaying autor informations
            while ($donnees = $req_auteur->fetch())
            {

                echo '<img class="img-responsive" src="' . gravatarUrl($donnees['gravatar']) .'" alt="Avatar de l\'auteur"> Auteur : ';
                //autor badge
                echo userBadge($donnees['groupe']);
                //autor url
                echo '<a href="profil?user=' . $donnees['pseudo'] .'" target="_blank">';
                echo $donnees['pseudo'];
                echo '</a>';
            }

            $req_auteur->closeCursor();
            echo '<br/>Le : ';
            echo $date;
            ?>
            </p>
        </div>

        <?php include("nav.php") ?>

        <!-- news -->
        <div class="row">
            <div class="col-md-12">
                <?php echo tercode($contenu); ?>
            </div>
        </div>

        <!-- Displaying "epingle" comment -->
        <div class="row">
            <div class="col-md-12">
                <h2><span class="glyphicon glyphicon-pushpin"></span> Commentaires épinglés</h2>
                        <?php
                        //selecting comments
                        $req_commentaire_epingle = $bdd->prepare('SELECT * FROM comnews WHERE id_news = :id AND epingle = true');
                        $req_commentaire_epingle->execute(array(
                            'id' => strtolower($_GET['id'])
                        ));
                        while ($donnees_epingle = $req_commentaire_epingle->fetch())
                        {
                            ?>
                            <div class="panel panel-default">

                                <?php
                                //getting comment autor informations
                                $req_auteur_com = $bdd->prepare('SELECT * FROM user WHERE id = :id');
                                $req_auteur_com->execute(array(
                                    'id' => $donnees_epingle['id_auteur']
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
                                        <div style="text-align:right;">#<?php echo $donnees_epingle['id'] . ' ' . $donnees_epingle['date']; ?></div>
                                    </div>
                                    <?php
                                }
                                $req_auteur_com->closeCursor();
                                ?>

                                <!-- Comment core -->
                                <div class="panel-body">
                                    <?php
                                    echo tercode($donnees_epingle['contenu']);
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        $req_commentaire_epingle->closeCursor();
                        ?>
            </div>
        </div>
        <!-- /commentaires epingle -->

        <!-- Commentaires -->
        <div class="row">
            <div class="col-md-12">
                <h2><span class="glyphicon glyphicon-comment"></span> Commentaires</h2>
                <?php
                //selecting comments
                $req_commentaire = $bdd->prepare('SELECT * FROM comnews WHERE id_news = :id');
                $req_commentaire->execute(array(
                    'id' => strtolower($_GET['id'])
                ));
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
                                            echo '<br/><a href="modo/comepingle?id=' . $donnees['id'] . '&action=unepingle" target="_blank"><span class="glyphicon glyphicon-asterisk"></span> Désépingler</a>';
                                        }
                                        else
                                        {
                                            echo '<br/><a href="modo/comepingle?id=' . $donnees['id'] . '&action=epingle" target="_blank"><span class="glyphicon glyphicon-pushpin"></span> Epingler</a>';
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
        <!-- /commentaires -->

        <!-- formulaire commentaire -->
        <?php
        if($connecte)
        {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="comment">
                        <input type="hidden" name="id_news" value="<?php echo $_GET['id'];?>" />
                        <a href="<?php echo $location_url; ?>/tool/tercode">Tester son tercode</a><br/>
                        Nouveau commentaire : <textarea name="commentaire" class="form-control"></textarea><br/>
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span> Envoyer</button>
                    </form>
                </div>
            </div>
            <?php
        }
        else
        {
            echo '<!-- You are unable to comment -->';
        }
        ?>
    </div>
</body>
</html>
