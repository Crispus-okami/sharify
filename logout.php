<?php
    // page de deconnection
    session_start(); // demarrer la session
    session_destroy(); // supprimer les informations en session
    session_abort(); // fermer la session
    // echo "<script>alert(\"On espère vous revoir bientôt :-)\")</script>";
    header('location:login.php') // rediriger l'utilisateur vers la page de connection
    
?>