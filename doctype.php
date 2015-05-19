<?php
//this file is loaded in each page
session_start();

include_once("files/php/settings.php"); //settings file
include_once("files/php/tercode.function.php"); //function terCode
include_once("files/php/recaptcha.function.php"); //function captchaIsValid and captchaGet
include_once("files/php/gravatar.function.php"); //function gravatarUrl
include_once("files/php/userbadge.cms.function.php"); //function userBadge

//if a SESSION['pseudo'] is set, then the user is connected
if(isset($_SESSION['pseudo']))
{
    $connecte = true;
}
else
{
    $connecte = false;
}

//database connexion
try
{
    $bdd = new PDO('mysql:host=' . $settingsDbHost . ';dbname=' . $settingsDbName . ';charset=utf8', $settingsDbUser, $settingsDbPassword);
}
catch (Exception $e)
{
    echo 'An error occured trying to connect to the database. Please contact the administrator at ' . $settingsAdminEmail;
    die('Erreur : ' . $e->getMessage());
}

//date variable
$date_now = date('d') . '/' . date('m') . '/'  . date('Y') . ' ' . date('H') . 'h' . date('i');

//base url
$location_url = $settingsBasUrl;
?>
