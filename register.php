<?php
    session_start(); // démarrer une session
    if(!empty($_SESSION['id'])) // verifier si un utilisateur est connecté
        {
            // si oui,
            header('location:index.php'); // redirigé l'utilisateur vers la page d'acceuil
        }
        else
        {
    require('utils/engine/functions.php'); // importer les fonctions

    if(isset($_POST['reg'])) // Verifier que le bouton se connecter a bien ete clique - (forme de sécurite anti sql injection)
    {
        create_user(); // executer la fonction de création d'un utilisateur
    }

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utils/static/css.css">
    <link rel="shortcut icon" href="utils/static/logow.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Registration</title>
</head>
<body class="text-center">
    <div class="container">
       <main class="form-signin">

       <form action="" method="POST">
           <img src="utils/static/logo.png" width="80px" height="80px">
        <h1>Inscription</h1>
        <input type="text" name="username" placeholder="Nom d'utilisateur" class="form-control">
        <input type="email" name="mail" placeholder="Email" class="form-control">

        <select name="ville" class="form-control" style="margin-left:20px">
        <option selected >Votre ville</option>
        <option value="ctn" class="form-control" >Cotonou</option>
        <option value="pn" class="form-control" >Porto-Novo</option>
        <option value="clv" class="form-control" >Calavi</option>
        </select>
        <input type="password" name="pass1" placeholder="Mot de passe" class="form-control">
        <input type="password" name="pass2" placeholder="Confirmez le mot de passe" class="form-control">
        <small>Vous avez déjà un compte ? <a href="login.php">Connectez vous</a></small>
        <input type="submit" value="S'inscrire" name="reg" class="w-100 btn btn-lg btn-primary">
      

</form>

       </main>


    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
