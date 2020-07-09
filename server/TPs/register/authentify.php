<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

<h2>Formulaire register</h2>


<form action="dashboard.php" method="post"  enctype="multipart/form-data">

<label for="nom">Votre nom</label>
<input type="text" name="nom" placeholder="name">

<label for="prenom">Votre Prenom</label>
<input type="text" name="prenom" placeholder="firstName">

<br>

<label for="birthDate">Votre date de naissance</label>
<input type="date" name="birthDate" placeholder="birthdate">

<br>

<div>
    <input type="radio" id="homme"
           name="homme" value="homme">
    <label for="homme">Homme</label>

    <input type="radio" id="femme"
           name="femme" value="femme">
    <label for="femme">Femme</label>

</div>
<br>

<label for="myAvatar">Votre photo de profil</label>
<input type="file" name="myAvatar">
<br>

<input type="submit">

</form>

</body>

</html>