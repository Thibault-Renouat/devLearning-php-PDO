<?php

include_once 'connectionBdd.php';


$reponse = $pdo->query('SELECT * FROM planets');


//var_dump($reponse->fetchAll());


?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            width: 90% !important;
            margin: 1rem;
           /* margin-top: 1rem; */
        }

    </style>
</head>
<br><br>
<a href="addPlanet.php">
    <button>Ajouter une planète</button>
</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Terrain</th>
        <th scope="col">allegiance</th>
        <th scope="col">Key Fact</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php

     while ($data = $reponse->fetch()){
    ?>
    <tr>
        <th scope="row"><?php echo($data['id'])?></th>
        <td><?php echo($data['name'])?></td>
        <td><?php echo($data['status'])?></td>
        <td><?php echo($data['terrain'])?></td>
        <td><?php echo($data['allegiance'])?></td>
        <td><?php echo($data['key_fact'])?></td>
        <td><img src="./images/<?php echo($data['image'])?>" alt="image de <?php echo($data['name'])?>"  style="max-width: 100px; max-height: 80px"></td>
        <td><a href="./planetDetail.php?id=<?php echo($data['id'])?>">Détail</a>
            <a title="Editer" href="edit-planet.php?id=<?php echo($data['id']); ?>">Editer</a>
            <hr>
            <a title="Supprimer" href="delete-planet.php?id=<?php echo($data['id']);?>" style="color: red">Supprimer</a></td>
    </tr>
<?php
}
$reponse->closeCursor(); ?>

    </tbody>
</table>
