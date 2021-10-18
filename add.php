<?php
    session_start(); // demarrer la session
    if(!empty($_SESSION['id']))
        { // Si l'utilisteur est bien connecté
            if(isset($_POST['add'])) // vérifier si l'envoie du formulaire à été fait
            {
                require('app/functions.php');  // importer les fonctions
                add_project(); // exécuter la fonction d'ajout de projet
                header('location:my_projects.php'); // redirigé l'utilisateur vers la liste des plans qu'il a partagé 
            }
        }
    else
        {
            // si 'lutilisteur n'est pas connecté 
            header('location:login.php'); // rediriger l'utilisateur vers la page de connection
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

    <title>Ajouter un nouvel appartement</title>
</head>
<body class="text-center">
    <div class="container">
       <main class="form-signin col-md-6">

       <form action="" method="POST" enctype="multipart/form-data">
           <img src="public/images/logo.png" width="80px" height="80px">
        <h1>Nouvel appartement</h1>
        <input type="text" name="name" placeholder="Nom de l'appartemment" class="form-control">
        <textarea name="desc" id="desc" cols="8" rows="5" class="form-control" style="margin-left:20px"> Ajoutez une desription</textarea>
        <small>Ajoutez une photo de votre appartement(Formats supportés jpg, jpeg, png)</small>
        <input type="file" name="img" placeholder="Photo de l'appartement" class="form-control">
        <input type="text" name="price" placeholder="Prix" class="form-control">
        <input type="text" name="loc" placeholder="Adresse" class="form-control">
        <select name="ville" class="form-control" style="margin-left:20px">
        <option value="ctn" class="form-control" >Cotonou</option>
        <option value="pn" class="form-control" >Porto-Novo</option>
        <option value="clv" class="form-control" >Calavi</option>
        </select>

        <input type="submit" value="Ajouter projet" name="add" class="w-100 btn btn-lg btn-primary">

</form>

       </main> 
                   
           
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.public/js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/public/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>