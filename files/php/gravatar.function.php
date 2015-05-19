<?php
function gravatarUrl($email, $size = "80", $rating = "g")
{
    $hash = md5(strtolower(trim($email)));
    $url = 'https://gravatar.com/avatar/' . $hash . '?s=' . $size . '&amp;r=' . $rating . '&amp;d=identicon';
    return $url;
}
?>
