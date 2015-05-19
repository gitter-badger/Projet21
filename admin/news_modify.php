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

if(empty($_GET['id']))
{
    header('Location: index');
    exit();
}

//on séléctionne la news
$req_news = $bdd->prepare('SELECT * FROM news WHERE id = :id');
$req_news->execute(array(
    'id' => strtolower($_GET['id'])
));

$news_match = false;

//on récupère la news
while ($donnees = $req_news->fetch())
{
    $id = $donnees['id'];
    $id_auteur = $donnees['id_auteur'];
    $titre = $donnees['titre'];
    $date = $donnees['date'];
    $image = $donnees['image'];
    $contenu = $donnees['contenu'];
    $news_match = true;
}

if(!$news_match)
{
    header('Location: index');
    exit();
}

$req_news->closeCursor();

$contenu_non_tercode = preg_replace('#<br />#iS', '', $contenu);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier la news</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Modifier la news</h1>
            <p>Modifier la news</p>
        </div>
        <?php include("../nav.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <h2>La news :</h2>
                <?php echo tercode($contenu); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Modifier la news : </h2>
                <form method="post" action="news_modify_cible">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                    Titre de la news : <input type="text" name="titre" value="<?php echo $titre; ?>" class="form-control">
                    Image de la news : <input type="text" name="image" value="<?php echo $image; ?>" class="form-control">
                    Date : <input type="text" name="date" value="<?php echo $date; ?>" class="form-control">
                    Id utilisateur de l'auteur (ne pas changer pour soi-même) : <input type="text" name="id_auteur" value="<?php echo $id_auteur; ?>" placeholder="exemple" class="form-control">
                    Contenu de la news :<br/>
                    <a href="<?php echo $location_url; ?>/tool/tercode">Tester son tercode</a><br/>
                    <textarea name="contenu" class="form-control"><?php echo $contenu_non_tercode; ?></textarea><br/>
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span> Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
