<div class="row">
    <div class="col-md-12">
        <?php
        if(!isset($connecte))
        {
            $connecte = false;
        }
        ?>
        <a href="<?php echo $location_url; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Acceuil</button></a>
        <?php
        //if user is connected, display navigation for users
        if($connecte)
        {
            ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['pseudo']; ?></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo $location_url; ?>/profil?user=<?php echo $_SESSION['pseudo']; ?>"><span class="glyphicon glyphicon-user"></span> Mon profil</a></li>
                    <li><a href="<?php echo $location_url; ?>/my-dashbord"><span class="glyphicon glyphicon-dashboard"></span> Mon dashbord</a></li>
                    <?php
                    //admin pannel
                    if($_SESSION['groupe'] == "administrateur")
                    {
                        ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo $location_url; ?>/admin/"><span class="glyphicon glyphicon-cog"></span> Panneau d'administration</a></li>
                        <?php
                    }
                    //moderator pannel
                    if($_SESSION['groupe'] == "moderateur" OR $_SESSION['groupe'] == "administrateur")
                    {
                        ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo $location_url; ?>/modo/"><span class="glyphicon glyphicon-bookmark"></span> Panneau de moderation</a></li>
                        <?php
                    }
                    ?>
                    <li class="divider"></li>
                    <li><a href="<?php echo $location_url; ?>/unsign"><span class="glyphicon glyphicon-off"></span> Deconnexion</a></li>
                </ul>
            </div>
            <?php
        }
        else
        {
            //if user is not connected
            ?>
            <a href="<?php echo $location_url; ?>/sign_up"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> S'inscrire</button></a>
            <a href="<?php echo $location_url; ?>/sign_in"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Se connecter</button></a>
            <?php
        }
        ?>
        <a href="<?php echo $location_url; ?>/news"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Les news</button></a>
    </div>
</div><br/>
