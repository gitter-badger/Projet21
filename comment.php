<?php
//post comment
include("doctype.php");
if(!$connecte)
{
    header('Location: index');
    exit();
}

//variable creation
$commentaire = htmlspecialchars($_POST['commentaire']);
$commentaire = nl2br($commentaire);
$id_news = htmlspecialchars($_POST['id_news']);
$id_auteur = $_SESSION['id'];
$date = date('d') . '/' . date('m') . '/'  . date('Y') . ' ' . date('H') . 'h' . date('i');
echo $date;

$req = $bdd->prepare('INSERT INTO comnews(id_auteur, id_news, date, contenu) VALUES(:id_auteur, :id_news, :date, :contenu)');
$req->execute(array(
    'id_auteur' => $id_auteur,
    'id_news' => $id_news,
    'date' => $date,
    'contenu' => $commentaire
));

header('Location: news_read?id=' . $id_news);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Commentaire</title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Commentaire posté</h1>
            <p>Commentaire correctement posté</p>
        </div>
        <?php include("nav.php") ?>
    </div>
</body>
</html>
