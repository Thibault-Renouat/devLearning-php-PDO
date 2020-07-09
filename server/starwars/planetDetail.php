<?php

include_once 'connectionBdd.php';
var_dump($_GET);
var_dump($_GET['id']);


$res = $pdo->prepare('SELECT * FROM planets WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>

<style>
    body{
        width: 50%;
        margin: auto;

    }

</style>

<h1><?php echo($fetchRes['name']) ?></h1><br>
<img  src="<?php echo('images/'.$fetchRes['image']); ?>"alt="Image de la planète <?php echo($fetchRes['name']); ?>" >
<br>
<h2><u>Allegiance :</u> <?php echo($fetchRes['allegiance']) ?></h2>
<hr>
<div><u>Key facts :</u> <?php echo($fetchRes['key_fact']) ?></div>
<hr>
<div><u>Terrain :</u> <?php echo($fetchRes['terrain']) ?></div>
<hr>
<?php $res->closeCursor(); ?>
</div>
