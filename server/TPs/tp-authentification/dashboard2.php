<?php
print_r($_POST);
echo '<hr>';
var_dump($_GET);

echo '<hr><hr>';
if ($_POST['login'] == 'thibault' && $_POST['password'] == 'admin') {
    echo("<h1> Bienvenue " . $_POST['login'] . "!");
} else {
    echo('Probleme d\'authentification veuillez réessayer');
}


if ($_GET['login'] == 'thibault' && $_GET['password'] == 'admin') {
    echo("<h1> Bienvenue " . $_GET['login'] . "!");
} else {
    echo('Probleme d\'authentification veuillez réessayer');
}


?>