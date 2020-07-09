<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
$adressesMail = [
    'aureliendelorme1@gmail.com',
    'test@gmail.com',
    'smithcrank@gmail.com',
    'test@humanbooster.com',
    'test@supinfo.com',
    'test@gmail.com',
    'aurelien.delorme@orange.fr',
    'test@yahoo.com',
    'bonjour@msn.com',
    'test@hotmail.com',
    'adelorme@humanbooster.com'
];

$total = count($adressesMail);

function percent($nombre, $total){
    return round(($nombre/$total)*100,2);
}
?>
<h1>Ici je parcours mon tableau d'email afin de retrouver tous les noms de domaine</h1>
<?php
$domains = [];

foreach ($adressesMail as $mail) {
    // J'utilise la fonction php explode sur l'adresse mail et je réccupére le deuxieme élément du tableau
    $domain = explode('@', $mail);
    $domains[] = $domain[1];
}
// On appel ici la fonction array_unique pour supprimer les doublons du tableau

var_dump(array_unique($domains));

// Je cré un nouveau tableau qui aura plus tard comme clé le nom de domaine et comme valeur le nombre
//d'occurence de ce domaine dans notre tableau d'adresse

$correspondanceMailNombre = [];
foreach ($domains as $domain){
    // En début de parcours, je cré une clé du nom du domaine courant initialisé à 0
    $correspondanceMailNombre[$domain] = 0;
    foreach ($adressesMail as $mail) {
        // Si les deux domaines sont similaires j'ajoute un à la clé de mon tableau qui correspondra au domaine
        if(explode('@',$mail)[1] == $domain){
            $correspondanceMailNombre[$domain] += 1;
        }
    }
}
?>

<table class="table">
    <thead>
    <th>
        Domaine
    </th>
    <th>
        Nombre d'occurence
    </th>
    <th>
        Pourcentage
    </th>
    </thead>
    <tbody>
    <?php
        foreach ($correspondanceMailNombre as $index=>$value) {
            echo('
                <tr>
                    <td>'.$index.'</td>
                    <td>'.$value.'</td>
                    <td>'.percent($value, $total).'</td>
                </tr>
                 ');
        }
    ?>

    </tbody>
</table>


