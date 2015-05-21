<?php
include("../doctype.php");
if(!$connecte)
{
    header('Location: ../index');
    exit();
}

//form verification


$bio = htmlspecialchars($_POST['bio']);
$bio = nl2br($bio);

$request = $bdd->prepare('UPDATE user SET bio = :bio WHERE id= :id');
$request->execute(array(
        'bio' => $bio,
        'id' => $_SESSION['id']
    ));


?>
<!DOCTYPE html>
<html>
<head>
    <title>Bio</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <div class="alert alert-success" role="alert"><span class="label label-success">Réussi</span> Votre bio a correctement été mis à jour</div>
    </div>
    <?php include("../nav.php") ?>
</div>
</body>
</html>
