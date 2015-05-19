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

if(isset($_POST['id']))
{
    $id = htmlspecialchars($_POST['id']);
}
else
{
    header('Location: index');
    exit();
}

$req = $bdd->prepare('DELETE FROM news WHERE id= :id');
$req->execute(array(
    'id' => $id
));

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
            <h1>Supprimer une news</h1>
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
