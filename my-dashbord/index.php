<?php include("../doctype.php");
if(!$connecte)
{
    header('Location: ../index');
    exit();
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Projet 21</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Paramètres</h1>
            <p>Personnaliser vos paramètres</p>
        </div>
        <?php include("../nav.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome</h2>
                <p>
                    Welcome on the cms of projet 21
                </p>
            </div>
        </div>
    </div>
</body>
</html>
