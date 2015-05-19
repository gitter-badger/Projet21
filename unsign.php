<?php
session_start();
session_destroy();
header('Location: index');
?>
<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Vous êtes deconnectés</h1>
            <p></p>
        </div>
    </div>
</body>
</html>
