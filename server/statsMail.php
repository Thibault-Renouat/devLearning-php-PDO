<?php


$mails = ['aureliendelorme1@gmail.com',
    'test@gmail.com',
    'smithcrank@gmail.com',
    'test@humanbooster.com',
    'test@supinfo.com',
    'test@gmail.com',
    'aurelien.delorme@orange.fr',
    'test@yahoo.com',
    'bonjour@msn.com',
    'test@hotmail.com',
    'adelorme@humanbooster.com'];


/*//var_dump($mails) ;

$stringTest = 'thibault.renouat@gmail.com';



$domain = strstr($stringTest, '@');
echo $domain;*/


/*$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr vaut maintenant array(2, 4, 6, 8)
unset($value); // Détruit la référence sur le dernier élément*/

$domains=[];
foreach ($mails as $domain) {
    $domains[]=ltrim((strstr($domain, '@')), '@') ;

}



foreach ($domains as $domain) {
    echo $domain.'<hr>';
//    echo '<hr>';
}



//array_unique();
echo '<hr>';

$domainsUnique= array_unique($domains);
$i=0;

foreach ($domains as $domain) {

    echo $i.'<hr>';

}

