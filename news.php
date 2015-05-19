<?php include("doctype.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Les news</title>
    <meta charset="utf-8" />
    <?php include("head.php"); ?>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Les news</h1>
            <p>Les news du site</p>
        </div>
        <?php include("nav.php");

        //getting news
        $reponse = $bdd->query('SELECT * FROM news ORDER BY id DESC LIMIT 0, 10');

        //display news
        while ($donnees = $reponse->fetch())
        {
            ?>
            <div class="row">
                <div class="col-md-8">
                    <h1><?php echo $donnees['titre']; ?></h1>
                    <a href="news_read?id=<?php echo $donnees['id']; ?>"><img class="img-responsive" src="<?php echo $donnees['image']; ?>" alt="image de la news" /><br/></a>
                    <a href="news_read?id=<?php echo $donnees['id']; ?>"> Lire la news</a>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <?php
        }

        $reponse->closeCursor(); 
        ?>
    </div>
</body>
</html>
