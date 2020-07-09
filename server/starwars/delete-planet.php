<?php
require_once 'connectionBdd.php';
require_once 'functions.php';
$id = $_GET['id'];
deletePlanet($pdo, $id);
header('Location: planets.php');
