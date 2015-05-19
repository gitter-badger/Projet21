<?php include("../doctype.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>TerCode</title>
    <meta charset="utf-8" />
    <?php include("../head.php"); ?>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>TerCode</h1>
            <p>TerCode, code de mise en page par Ternoc pour <a href="http://getbootstrap.com/" target="_blank">bootstrap</a></p>
        </div>
        <?php include("../nav.php"); ?>
        <div class="row">
            <div class="col-md-8">
                <?php
                if(!empty($_POST['texte']))
                {
                    $texte = htmlspecialchars($_POST['texte']);
                    $texte = nl2br($texte);
                    echo tercode($texte);
                }
                ?>
            </div>
            <div class="col-md-4">
                <h2>Comment mettre en page avec le tercode ?</h2>
                Le tercode permet de mettre en page dans les commentaires et sur le forum grâce à des "balises"<br/>
                Elles fonctionnent par pair : balise ouvrante entre parenthèses et balise fermante identique à la balise ouvrante avec un / au début.<br/>
                <h3>Les balises : </h3>

                <div class="panel panel-default">
                    <div class="panel-heading">(title)Titre(/title)</div>
                    <div class="panel-body">
                        <h2>Titre</h2>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(b)Ce texte est en gras(/b)</div>
                    <div class="panel-body">
                        <strong>Ce texte est en gras</strong>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(i)Ce texte est en italique(/i)</div>
                    <div class="panel-body">
                        <em>Ce texte est en italique</em>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(subtitle)Sous titre(/subtitle)</div>
                    <div class="panel-body">
                        <h3>Sous titre</h3>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(link=http://google.com)Lien vers google.com(/link)<br/><em>Attention, il faut bien mette http://</em></div>
                    <div class="panel-body">
                        <a href="http://google.com" target="_blank">Lien vers google.com</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(img=http://media.blizzard.com/sc2/media/wallpapers/wall010/wall010-1920x1080.jpg)Infobulle(/img)<br/><em>Ne pas oublier le http://</em></div>
                    <div class="panel-body">
                        <img src="http://media.blizzard.com/sc2/media/wallpapers/wall010/wall010-1920x1080.jpg" alt="image tercode" class="img-responsive" />
                    </div>
                </div>

                <h3>Balises avancés : </h3>
                <div class="panel panel-default">
                    <div class="panel-heading">(greenbox)Texte boite verte(/greenbox)<br/><em>Marche aussi avec bluebox pour une boite verte, redbox pour une boite rouge et orangebox pour une boite orange</em></div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert">Texte boite verte</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">(greenbar)10(/greenbar)<br/>
                        <em>Il faut indiquer le pourcentage de la barre de 0 à 100</em><br/>
                        <em>Marche aussi avec bluebar pour une barre bleue, redbar pour une barre rouge et orangebar pour une barre orange</em>
                    </div>
                    <div class="panel-body">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                <span class="sr-only">10% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="tercode">
                    Tester votre tercode : <textarea name="texte" class="form-control"><?php
                        if(!empty($_POST['texte']))
                        {
                            $texte = htmlspecialchars($_POST['texte']);
                            echo $texte;
                        }?></textarea><br/>
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-pencil"></span> Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
