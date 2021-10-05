<?php

    require('utils/engine/functions.php'); // importer les fonction
    delete_project($_GET['id']); // supprimer le projet en exécutant la fonction de surpression qui en parametre l'identifiant du projt a supprimer
    

?>