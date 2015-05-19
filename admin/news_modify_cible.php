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

//vérification du formulaire
if(empty($_POST['titre']) OR empty($_POST['image']) OR empty($_POST['date']) OR empty($_POST['id_auteur']) OR empty($_POST['contenu']) OR empty($_POST['id']))
{
    header('Location: index');
    exit();
}

$id = htmlspecialchars($_POST['id']);
$titre = htmlspecialchars($_POST['titre']);
$image = htmlspecialchars($_POST['image']);
$date = htmlspecialchars($_POST['date']);
$id_auteur = htmlspecialchars($_POST['id_auteur']);
$contenu = htmlspecialchars($_POST['contenu']);
$contenu = nl2br($contenu);

//insertion dans la base de donnée
$insert = $bdd->prepare('UPDATE news SET titre = :titre, image = :image, date = :date, id_auteur = :id_auteur, contenu = :contenu WHERE id = :id');
$insert->execute(array(
    'titre' => $titre,
    'image' => $image,
    'date' => $date,
    'id_auteur' => $id_auteur,
    'contenu' => $contenu,
    'id' => $id
));
$insert->closeCursor();
header('Location: index');

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
            </div>
        </div>
    </div>
</body>
</html>
