<?php
/*
- This is the settings file.


=== Database settings ===
*/

$settingsDbHost = "localhost"; //Databe host
$settingsDbName = "ternoc"; //Database name
$settingsDbUser = "root"; //Database user
$settingsDbPassword = ""; //Database password for user

/*
=== URL settings ===
*/

$settingsBasUrl = "http://localhost"; //base of the URL where it's placed. Format : protocol://domain.tld (ex : http://projet21.eu)
$settingsDevMode = true; //If in dev mode, password will be stocked as not crypted

/*
=== ReCaptcha settings ==
https://www.google.com/recaptcha
*/

$settingsUseReCaptchaSignUp = true; //if you want a captcha for the sign up
$settingsReCaptchaPublicKey = "6LckmAYTAAAAAMh5dtykdknt6Y5iwg3VCzr7opbh"; //your reCaptcha public key. Check https://www.google.com/recaptcha
$settingsReCaptchaPrivateKey = "6LckmAYTAAAAAMxKAHDzglYnu_mFquPRcPl0PegH"; //your reCaptcha private keY. Check https://www.google.com/recaptcha

/*
=== Admin contact ===
*/
$settingsAdminEmail = "ternoc@projet21.eu"; //admin email contact. Display in case of error
?>
