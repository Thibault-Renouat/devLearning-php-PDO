<?php
include 'headLinks.php';
include 'functions.php';
include 'connectionBdd.php';
$idPlanet = $_GET['id'];

$planet = getPlanetById($pdo, $idPlanet);

$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validationEditForm();
/*    var_dump($returnValidation);
    die();*/
    $errors = $returnValidation['errors'];
    $imageUrl = $returnValidation['image'];
    if( count($errors) === 0) {
        updateBdd($pdo, $imageUrl, $planet['id']);
        header('Location: planets.php');
    }
}

var_dump($errors);
var_dump($_FILES['image']);
?>

<form method="post" action="edit-planet.php?id=<?php echo($planet['id']);?>" enctype="multipart/form-data">
<label>Nom de la planète</label>
<input name="name" value="<?php echo($planet['name']) ?>" class="form-control" placeholder="Nom de la planète">
<label>Status de la planète</label>
<input name="status" value="<?php echo($planet['status']) ?>" class="form-control" placeholder="Status" >
<label>Terrain</label>
<input name="terrain" value="<?php echo($planet['terrain']) ?>" class="form-control" placeholder="Terrain" >
<label>Allegiance</label>
<select name="allegiance" class="form-control" placeholder="Allegiance" >
<?php
foreach (getAllegiances() as $allegiance) {
$selected = '';
if($planet['allegiance'] === $allegiance){
$selected = 'selected';
}
echo('<option '.$selected.' value="'.$allegiance.'">'.$allegiance.'</option>');
}
?>
</select>
<label>Key facts</label>
<textarea name="key_fact" class="form-control" placeholder="Key facts" ><?php echo($planet['key_fact']) ?>
</textarea><br>
<label>Image :</label> <br>
<img src="<?php echo('images/'.$planet['image']);?>"><br><br>
<input type="file" name="image" value="<?php echo($planet['image']) ?>"><br><br>
<input type="submit">
</form>


