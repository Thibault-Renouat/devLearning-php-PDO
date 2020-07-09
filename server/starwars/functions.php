<?php

function validationForm() {


    $errors = [];
    $imageUrl='';
    if($_FILES['image']['size'] == 0){
        $errors[] = 'Veuillez ajouter une image';
    }
    if($_FILES['image']['type'] === 'image/png'){
        if($_FILES['image']['size']<80000){
            $extension = explode('/', $_FILES['image']['type'])[1];
            $imageUrl = uniqid().'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$imageUrl);
        } else {
            $errors[] = 'Fichier trop lourd impossible';
        }
    } else {
        $errors[] = 'Impossible : j\'accepte que les PNGS !';
    }
    if (empty($_POST['name'])) {
        $errors[] = 'Veuillez saisir le nom de la planète';
    }
    if ( empty($_POST['status'])) {
        $errors[] = 'Veuillez saisir le status de la planète';
    }
    if ( empty($_POST['terrain'])) {
        $errors[] = 'Veuillez terrain le status de la planète';
    }
    if ( empty($_POST['allegiance'])) {
        if(!in_array($_POST['allegiance'], getAllegiances())){
            $errors[] = 'Allegiance inconue !!!';
        }
        $errors[] = 'Veuillez terrain l\'allegiance de la planète';
    }
    if ( empty($_POST['key_fact'])) {
        $errors[] = 'Veuillez la key fact de la planète';
    }

    return ['errors'=>$errors, 'image'=>$imageUrl];
}

function validationEditForm() {


    $errors = [];
    $imageUrl='';

    if(isset($_FILES['image']) && $_FILES['image']['error'] ===0){

        if($_FILES['image']['size'] == 0){
            $errors[] = 'Veuillez ajouter une image';
        }
        if($_FILES['image']['type'] === 'image/png'){
            if($_FILES['image']['size']<80000){
                $extension = explode('/', $_FILES['image']['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$imageUrl);
            } else {
                $errors[] = 'Fichier trop lourd impossible';
            }
        } else {
            $errors[] = 'Impossible : j\'accepte que les PNGS !';
        }

    }

    if (empty($_POST['name'])) {
        $errors[] = 'Veuillez saisir le nom de la planète';
    }
    if ( empty($_POST['status'])) {
        $errors[] = 'Veuillez saisir le status de la planète';
    }
    if ( empty($_POST['terrain'])) {
        $errors[] = 'Veuillez terrain le status de la planète';
    }
    if ( empty($_POST['allegiance'])) {
        if(!in_array($_POST['allegiance'], getAllegiances())){
            $errors[] = 'Allegiance inconue !!!';
        }
        $errors[] = 'Veuillez terrain l\'allegiance de la planète';
    }
    if ( empty($_POST['key_fact'])) {
        $errors[] = 'Veuillez la key fact de la planète';
    }

    return ['errors'=>$errors, 'image'=>$imageUrl];
}


function addBdd($pdo, $imageUrl){
    $req = $pdo->prepare(
        'INSERT INTO planets(name, status, terrain , allegiance, key_fact, image)
VALUES(:name, :status, :terrain, :allegiance, :key_fact, :image)');
    $req->execute([
        'name' => $_POST['name'],
        'status' => $_POST['status'],
        'terrain' => $_POST['terrain'],
        'allegiance' => $_POST['allegiance'],
        'key_fact' => $_POST['key_fact'],
        'image' => $imageUrl
    ]);
}

function updateBdd($pdo, $imageUrl, $id){

    if(!empty($imageUrl)){
        $req = $pdo->prepare('UPDATE planets SET name = :name, status = :status , terrain = :terrain ,
allegiance = :allegiance , key_fact = :key_fact , status = :status, image = :image WHERE id = :id');
        $req->execute([
            'name' => $_POST['name'],
            'status' => $_POST['status'],
            'terrain' => $_POST['terrain'],
            'allegiance' => $_POST['allegiance'],
            'key_fact' => $_POST['key_fact'],
            'image' => $imageUrl,
            'id'=> $id
        ]);

    } else {
        $req = $pdo->prepare('UPDATE planets SET name = :name, status = :status , terrain = :terrain ,
allegiance = :allegiance , key_fact = :key_fact , status = :status WHERE id = :id');
        $req->execute([
            'name' => $_POST['name'],
            'status' => $_POST['status'],
            'terrain' => $_POST['terrain'],
            'allegiance' => $_POST['allegiance'],
            'key_fact' => $_POST['key_fact'],
            'id'=> $id
        ]);

    }
}

function getAllegiances() {

    return $allegiances=['Empire', 'République', 'Neutre', 'Séparatisites'];



}



function deletePlanet($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM planets WHERE id = :id');
    $res->execute(['id' => $id]);

}

function getPlanetById($pdo,$id){

    $res = $pdo->prepare('SELECT * FROM planets WHERE id = :id');
    $res->execute(['id'=> $id]);
   return $fetchRes = $res->fetch();


}