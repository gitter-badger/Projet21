<?php include("../doctype.php");
if(isset($_SESSION['groupe']))
{
    if($_SESSION['groupe'] != "administrateur")
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
    <title>Panneau d'administration</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Panneau d'administration</h1>
            <p>Panneau d'administration du site</p>
        </div>
        <?php include("../nav.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Ecrire une news</h2>
                <form method="post" action="news_write">
                    Titre de la news : <input type="text" name="titre" placeholder="exemple" class="form-control">
                    Image de la news : <input type="text" name="image" placeholder="http://i.imgur.com/VKTPd2M.jpg" class="form-control">
                    Date : <input type="text" name="date" value="<?php echo $date_now; ?>" class="form-control">
                    Id utilisateur de l'auteur (ne pas changer pour soi-même) : <input type="text" name="id_auteur" value="<?php echo $_SESSION['id']; ?>" placeholder="exemple" class="form-control">
                    Contenu de la news :<br/>
                    <a href="<?php echo $location_url; ?>/tool/tercode">Tester son tercode</a><br/>
                    <textarea name="contenu" class="form-control"></textarea><br/>
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span> Envoyer</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Les news</h2>
                <?php
                //on séléctionne les news
                $reponse = $bdd->query('SELECT * FROM news ORDER BY id DESC LIMIT 0, 10');

                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch())
                {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo $location_url; ?>/news_read?id=<?php echo $donnees['id']; ?>" target="_blank"><strong><?php echo $donnees['titre']; ?></strong></a><br/>
                            <a href="news_modify?id=<?php echo $donnees['id']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modifier cette news</a><br/>
                            <a href="news_delete?id=<?php echo $donnees['id']; ?>"><span class="glyphicon glyphicon-remove"></span> Supprimer cette news</a><br/>
                        </div>
                    </div>
                    <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </div>
        </div>
    </div>
</body>
</html>
