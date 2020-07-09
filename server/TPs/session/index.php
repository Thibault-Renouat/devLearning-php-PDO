<?php

session_start();

var_dump($_SESSION);


session_start();
if($_SESSION['username']){
header('Location: connected.php');
} else {
header('Location: login.php');
}

