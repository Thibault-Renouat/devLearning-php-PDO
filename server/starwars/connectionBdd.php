<?php
$host = 'localhost';
$dbName = 'starwars';
$user = 'root';
$password = '';
try { $pdo = new PDO(
    'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',$user,$password);
        // Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo'je suis connecté à ma base de données';
    }   catch
       (PDOException $e) {
        throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());    exit; }