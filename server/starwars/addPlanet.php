<?php
include 'headLinks.php';
include 'functions.php';
require_once 'connectionBdd.php';
include 'menu.php';

/*echo '<br>hello world again';*/


$errors=[];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validationForm();
    $errors = $returnValidation['errors'];
    if( count($errors) === 0) {
        addBdd($pdo, $returnValidation['image']);
        header('Location: planets.php');
    }
}

?>


<form method="post" action="addPlanet.php" enctype="multipart/form-data" >
<label>Nom de la planète</label>
<input name="name" class="form-control" placeholder="Nom de la planète" required>
<label>Status de la planète</label>
<input name="status" class="form-control" placeholder="Status" >
<label>Terrain</label>
<input name="terrain" class="form-control" placeholder="Terrain" >
<label>Allegiance</label>
<select name="allegiance" class="form-control" placeholder="Allegiance" required >
    <option></option>
<?php
foreach (getAllegiances() as $allegiance) {
    
echo('<option value="'.$allegiance.'">'.$allegiance.'</option>');
}
?>
</select>
<label>Key facts</label>
<textarea name="key_fact" class="form-control" placeholder="Key facts" ></textarea>
<label>Image</label>
<input type="file" name="image"><br><br>
<input type="submit">
<?php
if(count($errors) != 0){
echo(' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
foreach ($errors as $error){
echo('<div class="error">'.$error.'</div>');
}
}
?>
</form>

