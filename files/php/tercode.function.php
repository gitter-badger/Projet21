<?php
//fonction tercode
function tercode($tercode_input)
{
    $tercode_input = nl2br($tercode_input); // On crée des <br /> pour conserver les retours à la ligne
    $tercode_input = preg_replace('#\(b\)(.+)\(/b\)#isU', '<strong>$1</strong>', $tercode_input); // (b)(/b) --> gras
    $tercode_input = preg_replace('#\(i\)(.+)\(/i\)#isU', '<em>$1</em>', $tercode_input); // (i)(/i) --> italique
    $tercode_input = preg_replace('#\(title\)(.+)\(/title\)#isU', '<h2>$1</h2>', $tercode_input); // (title)(/title) --> titre h2
    $tercode_input = preg_replace('#\(subtitle\)(.+)\(/subtitle\)#isU', '<h2>$1</h2>', $tercode_input); // (subtitle)(/subtitle) --> titre h3
    $tercode_input = preg_replace('#\(greenbox\)(.+)\(/greenbox\)#isU', '<div class="alert alert-success" role="alert">$1</div>', $tercode_input); // (greenbox)(/greenbox) --> boite verte
    $tercode_input = preg_replace('#\(bluebox\)(.+)\(/bluebox\)#isU', '<div class="alert alert-info" role="alert">$1</div>', $tercode_input); // (bluebox)(/bluebox) --> boite bleue
    $tercode_input = preg_replace('#\(orangebox\)(.+)\(/orangebox\)#isU', '<div class="alert alert-warning" role="alert">$1</div>', $tercode_input); // (orangebox)(/orangebox) --> boite orange
    $tercode_input = preg_replace('#\(redbox\)(.+)\(/redbox\)#isU', '<div class="alert alert-danger" role="alert">$1</div>', $tercode_input); // (redbox)(/redbox) --> boite rouge
    $tercode_input = preg_replace('#\(link=(.+)\)(.+)\(/link\)#i', '<a href="$1" target="_blank">$2</a>', $tercode_input); //lien

    // (greenbar)(/greenbar) --> bar verte
    $tercode_input = preg_replace('#\(greenbar\)(.+)\(/greenbar\)#isU', '<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="$1" aria-valuemin="0" aria-valuemax="100" style="width: $1%">
    <span class="sr-only">$1% Complete (success)</span>
    </div></div>', $tercode_input);

    // (bluebar)(/bluebar) --> bar bleue
    $tercode_input = preg_replace('#\(bluebar\)(.+)\(/bluebar\)#isU', '<div class="progress">
    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="$1" aria-valuemin="0" aria-valuemax="100" style="width: $1%">
    <span class="sr-only">$1% Complete (success)</span>
    </div></div>', $tercode_input);

    // (redbar)(/redbar) --> bar rouge
    $tercode_input = preg_replace('#\(redbar\)(.+)\(/redbar\)#isU', '<div class="progress">
    <div class="progress-bar progress-bar-info progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="$1" aria-valuemin="0" aria-valuemax="100" style="width: $1%">
    <span class="sr-only">$1% Complete (success)</span>
    </div></div>', $tercode_input);

    // (orangebar)(/orangebar) --> bar rouge
    $tercode_input = preg_replace('#\(orangebar\)(.+)\(/orangebar\)#isU', '<div class="progress">
    <div class="progress-bar progress-bar-info progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="$1" aria-valuemin="0" aria-valuemax="100" style="width: $1%">
    <span class="sr-only">$1% Complete (success)</span>
    </div></div>', $tercode_input);

    //image
    $tercode_input = preg_replace('#\(img=(.+)\)(.+)\(/img\)#i', '<img src="$1" alt="$2" title="$2" class="img-responsive" />', $tercode_input);

    return $tercode_input;
}
?>
