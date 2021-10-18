<?
session_start(); // démarrage de la session

    include('app/functions.php'); // importer les fontions 
    if(!empty($_SESSION['id'])) // verifier s'il existe un utilisateur connecter
        { // si il y a un utilisateur connecté en session,
            header('location:index.php'); // redirigé l'utilisateur vers la page d'accueil
        }
    else
        { // si aucun utilisateur n'est connecté,
            if(isset($_POST['log'])) // Verifier que le bouton se connecter a bien ete clique - (forme de sécurite anti sql injection)
            {
            login(); // executé la fonction de connection
            }
        }    
    
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/css.css">
    <link rel="shortcut icon" href="public/images/logow.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Se connecter</title>
</head>
<body class="text-center">
    <div class="container">
        <main class="form-signin">
        <form action="" method="POST">
           <img src="public/images/logo.png" width="80px" height="80px">
            <h1>Connexion</h1>
            <input type="text" name="userid" placeholder="Username / email adress" class="form-control">
            <input type="password" name="pass" placeholder="Password" class="form-control">
            <small>Vous n'êtes pas encore inscrit ? <a href="register.php">Inscrivez vous</a></small>

            <input type="submit" value="Login" name="log" class="w-100 btn btn-lg btn-primary">
            
        </form>
    </div>    
</body>
</html>