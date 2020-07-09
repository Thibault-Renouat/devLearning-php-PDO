<?php

//phpinfo();

echo '<pre>';
var_dump($_POST);
echo '</pre><br>';

echo '<pre>';
var_dump($_FILES);
echo '</pre>';

/*error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);*/
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['myAvatar']) and $_FILES['myAvatar']['error'] == 0) {
// Testons si le fichier n'est pas trop gros
    if ($_FILES['myAvatar']['size'] <= 1000000) {
// Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['myAvatar']['name']);
//        $extension_upload = $infosfichier['extension'];
        $extension_upload= $_FILES['myAvatar']['type'];   // on preferera ici utiliser le mime_type
        $extensions_autorisees = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
        if (in_array($extension_upload, $extensions_autorisees)) {
// On peut valider le fichier et le stocker définitivement
//            move_uploaded_file($_FILES['myAvatar']['tmp_name'], 'uploads/' . basename($_FILES['myAvatar']['name']));
            move_uploaded_file($_FILES['myAvatar']['tmp_name'], 'uploads/' . uniqid().'.'.$infosfichier['extension']);
            echo "L'envoi a bien été effectué !";
        } else {
            echo('J\'accepte que les images ...');
        }
    } else {
        echo('le fichier est trop lourd pour un petit serveur ... ');
    }
}


