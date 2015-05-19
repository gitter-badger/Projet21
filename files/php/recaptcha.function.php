<?php
/*
Call this function to verify is the ReCaptcha is valid
Call with parameter :
    $_POST['g-recaptcha-response']
    $settingsReCaptchaSecretKey
Call with this optional parmater :
    $user_ip
Return false is recaptcha is invalid or true if valid
if(isValid($_POST['g-recaptcha-response']))
{
    echo 'recaptcha valid';
}
else
{
    echo 'recaptcha invalid'
}

*/
function captchaIsValid($code, $secretKey, $ip = null)
{
    if (empty($code)) {
        return false;
    }
    $params = [
    'secret'    => $secretKey,
    'response'  => $code
    ];
    if( $ip ){
        $params['remoteip'] = $ip;
    }
    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
    } else {
        $response = file_get_contents($url);
    }

    if (empty($response) || is_null($response)) {
        return false;
    }

    $json = json_decode($response);
    return $json->success;
}

/*
Call this function to get the g-recaptcha rendering
Call with parameter :
    $settingsReCaptchaPublicKey
Return html code
*/
function captchaGet($publicKey)
{
    $htmlCode = '<div class="g-recaptcha" data-sitekey="' . $publicKey . '"></div>';
    return $htmlCode;
}
?>
