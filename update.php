<?php
    session_start();
    if(!empty($_SESSION['id'])) // verifier si l'utilisateur est bien connecté
        {
            require('utils/engine/functions.php'); // importer les fonctions
            $project = get_project($_GET['id']); // récupérer le projet à modifier grace a son identifiant
            if(isset($_POST['add'])) // si l'envoie du formulaire est confirmé
            {
                
                update_project($_GET['id']); // exécuter la fonction de mise à  jour
                unlink($project['banner']); // supprimer l'ancienne image
                header('location:my_projects.php'); // rediriger l'utilisateur vers la liste des plans qu'il a partagé
            }
        }
    else
        { // si l'utilisateur n'est pas connecté
            header('location:login.php'); // on le redirige vers la page de connection
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

    <title>Modifier plan</title>
</head>
<body class="text-center">
    <div class="container">
       <main class="form-signin col-md-6">

       <form action="" method="POST" enctype="multipart/form-data">
           <img src="utils/static/logo.png" width="80px" height="80px">
        <h1>Modifier projet</h1>
        <?php

            echo('

            <input type="text" name="name" placeholder="'.$project['name'].'" class="form-control" required="true">
        <textarea name="desc" id="desc" cols="8" rows="5" required="true" class="form-control" style="margin-left:20px">'.$project['description'].'</textarea>
        <small>Ajoutez une photo de votre appartement(Formats supportés jpg, jpeg, png)</small>
        <input type="file" name="img" placeholder="photo de l\'appatement" class="form-control" required="true">
        <input type="text" required="true" name="price" placeholder="'.$project['price'].'" class="form-control">
        <input type="text" name="loc" required="true" placeholder="'.$project['location'].'" class="form-control">
        <select name="ville" required="true" class="form-control"style="margin-left:20px">
        <option value="ctn" class="form-control" >Cotonou</option>
        <option value="pn" class="form-control" >Porto-Novo</option>
        <option value="clv" class="form-control" >Calavi</option>
        <input type="submit" value="Ajouter projet" name="add" class="w-100 btn btn-lg btn-primary">

            
            ');

        ?>
</form>

       </main> 
                   
           
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>