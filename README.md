# sharify

## Organisation du repo

- La racine du projet contient toutes les pages principales du projet.
    
- Le répertoire utils contient tous les fichier statiques et les fonction du projet.
    

## Comment installer ?

- Assurez-vous de disposer d'un serveur apache et de mysql sur votre machine.
    
- Ouvrez le fichier connect\_db.php (chemin du fichier : app/connect\_db.php) dont le contenue ressemble a ceci.
    
    ```php
    <?php
        $db = new PDO('mysql:host=localhost; dbname=share', 'username', 'password');
    ?>
    ```
- Remplacer les chaines de caractères 'username' et 'password' respectivement par votre nom d'utilisateur et votre mot de passe mysql.

- Créez ensuite une base de donnée qui a pour nom share.
- créez puis importez les table plans et users depuis les fichier plans.sql et users.sql contenues dans le même repertoire que le fichier connect_db.php

Eh voilà ! La procédure d'installation est terminée ! Hatez vous de créer un compte utilisateur pour pouvoir jouir pleinement des fonctionnalités de sharify.😁
