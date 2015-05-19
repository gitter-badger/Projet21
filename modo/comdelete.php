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

if(empty($_GET['id']))
{
    header('Location: index');
    exit();
}

$req = $bdd->prepare('DELETE FROM comnews WHERE id = :id');
$req->execute(array(
    'id' => $_GET['id']
));

header('Location: index');
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
                        <?php echo $_GET['id']; ?>
                    </div>
                </div>
    </div>
</body>
</html>
