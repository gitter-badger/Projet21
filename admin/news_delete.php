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

$id = "0";
if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une news</title>
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
                <h2>Supprimer une news</h2>
                <form method="post" action="news_delete_cible">
                    Id de la news : <input type="text" name="id" value="<?php echo $id; ?>" class="form-control">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span> Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
