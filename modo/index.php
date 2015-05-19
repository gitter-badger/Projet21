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
            <div class="col-md-4">
                <h2>Liste des commentaires</h2>
                <a href="comlist" type="button" class="btn btn-default">Lister les commentaires</a>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>
</html>
