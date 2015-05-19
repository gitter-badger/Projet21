<?php
function userBadge($groupe)
{
    if($groupe == "administrateur")
    {
        $badgehtml = '<span class="label label-danger">Admin</span> ';
    }
    elseif($groupe == "moderateur")
    {
        $badgehtml = '<span class="label label-info">Modo</span> ';
    }
    elseif($groupe == "vip")
    {
        $badgehtml = '<span class="label label-success">VIP</span> ';
    }
    else
    {
        $badgehtml = '';
    }
    return $badgehtml;
}
?>
