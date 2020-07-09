<?php

session_start();

var_dump($_POST);   // la valeur de la checkbox ets dans ["remember"]=> string(2) "on"]

if($_POST['login'] != '' && $_POST['password'] != '') {
    $_SESSION['username'] = $_POST['login'];
}

if(!$_SESSION['username']) {
    header('Location: index.php');
}


if ($_POST['remember'] == 'on') {

    setcookie("username", $_POST['login'], time()+3600);
    echo '<p>je me souviendrais de toi :)</p>' ;

}

echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';


?>
Bienvenue <strong><?php echo($_SESSION['username']); ?></strong> je me rapellerais de toi ! <br>
<a href="disconnect.php">Même si je me déconecte ? </a>
