<?php
function file_upload($dir)
{
    /* Algorithme d'upload de fichier
           Cette fonction prends en parametre une chaine de charactère qui est le chemin du dossier de destination du fichier
        */

    if ($_FILES['zip']['name']) // vérifie si le fichier à bien été fournie par l'utilisateur
    {
        if (!$_FILES['zip']['error']) // on vérifie si le fichier ne contient pas d'erreur
        {
            $temp_name = $_FILES['zip']['tmp_name']; // nom temporaire du fichier sur le serveur
            $type = $_FILES['zip']['type']; // extension du fichier 
            $size = $_FILES['zip']['size']; // taille du fichier fournie


            if (!strstr($type, 'zip')) // verifier si le format du fichier est correct
            {
                // si le format est incorrect affichez le message d'erreur suivant

                echo "<script>alert(\"Erreur ! Le format du fichier est incorrect\")</script>";

                exit(); // arreter l'execution du script
            } else // si le format est correcte, 
            {
                $name = $_FILES['zip']['name']; // nom du fichier
                $urlf = $dir . $name; // chemin d'acces du fichier
                move_uploaded_file($temp_name, $dir . $name); // uploader le ficher dans le dossier de destination
            }
        }
    }
    return $urlf; // retourne le chemin de l'image 
}

function img_upload($dir)
{
    /* Algorithme d'upload d'image
           Cette fonction prends en parametre une chaine de charactère qui est le chemin du dossier de destination de l'image
        */

    if ($_FILES['img']['name']) // vérifie si l'image à bien été fournie par l'utilisateur
    {
        if (!$_FILES['img']['error']) // on vérifie si l'image ne contient pas d'erreur
        {
            $temp_name = $_FILES['img']['tmp_name']; // nom temporaire de l'image sur le serveur
            $type = $_FILES['img']['type']; // extension de l'image 
            $size = $_FILES['img']['size']; // taille de l'image fournie

            if ($size > (2048000)) // vérifier si la taille de l'image est supérieure a 2 mo

            {
                echo "<script>alert(\"Erreur ! Votre image est trop lourde\")</script>"; // message d'erreur afficher quand l'image dépasse 2 mo
                exit(); // arreter l'execution du script
            } else {
                if (!strstr($type, 'jpg') && !strstr($type, 'png') && !strstr($type, 'jpeg')) // verifier si le format de l'image est correct
                {
                    // si le format est incorrect affichez le message d'erreur suivant

                    echo "<script>alert(\"Erreur ! Le format de l'image est incorrect\")</script>";

                    exit(); // arreter l'execution du script
                } else // si le format est correcte, 
                {
                    $name = $_FILES['img']['name']; // nom du fichier
                    $url = $dir . $name; // chemin d'acces du fichier
                    move_uploaded_file($temp_name, $dir . $name); // uploader le ficher dans le dossier de destination
                }
            }
        }
    } else {
        echo "<script>alert(\"Erreur image\")</script>";
        exit();
    }
    return $url; // retourne le chemin de l'image 
}
