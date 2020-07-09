<style>
    body {
        width: 90%;
        margin: auto;
        margin-top: 1rem;
    }
</style>

<form method="post" action="connected.php" enctype="multipart/form-data">
    <label>Username : </label>
    <input name="login" type="text" placeholder="Utilisateur"> <br><br>
    <label>Password : </label>
    <input name="password" type="password" placeholder="Mot de passe"> <br><br>
    <label for="remember">Se souvenir de moi</label>
    <input type="checkbox" name="remember"><br><br>

    <input type="submit" placeholder="Mot de passe">
</form>
