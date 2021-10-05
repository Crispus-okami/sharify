<?php

function search($word)
{ // fonction du moteur de recherche
    // cette fontion prend en paramètre le mot clé de la recherche
    // la recherche se fait en fonction du titre et de la description
    $query = preg_replace("#[^a-zA-Z ?0-9]#i", "", $word); // nettoyage du mot clé
    $sql = "SELECT * FROM plans WHERE name LIKE ? OR description LIKE ? OR ville LIKE ?"; // requete de reherche
    require('connect_db.php'); // récupération de l'objet de connection à la base de données 
    $req = $db -> prepare($sql); 
    $req -> execute(array('%'.$query.'%', '%'.$query.'%', '%'.$query.'%')); // execution de la requete de recherche
    return $req;
}

function delete_project($id)
{ // Cette fonction permet de supprimer un projet enn utilisant son identifiant
    require('connect_db.php');
    $req = "DELETE FROM plans WHERE id='$id'";
    $db ->query($req);
    header('location:my_projects.php');

}

function update_project($id)
{
    // Cette fonction permet de metttre à jour un projet
    require('uploader.php'); //importer les fontion d'uplod de fichier et d'image
    require('connect_db.php'); // récupérer l'objet de connection à la base de donnnées
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['desc']) && !empty($_POST['desc']) && isset($_POST['loc']) && !empty($_POST['loc']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['ville']) && !empty($_POST['ville'])) {
        //Vérifier si tous les champs sont remplis
        $project = $_POST['name']; // nouveau nom du projet 
        $desc = $_POST['desc'];// nouvelle description du projet
        $img_dir = "utils/media/img/"; // dossier de destination image
        $img_url = img_upload($img_dir); // upload la nouvelle photo
        $price = $_POST['price'];
        $loc = $_POST['loc'];
        $ville = $_POST['ville'];
        $req = "UPDATE plans SET name='$project', description='$desc', banner='$img_url', price='$price', location='$loc', ville='$ville' WHERE id='$id'"; // Misse a jour des infos au niveau de la base de données
        $db ->query($req);
        echo "<script>alert(\"Projet mis à jour avec succes\")</script>"; 

    }
    else{
        echo "<script>alert(\"Tous les champs sont requis\")</script>"; 
    }
}


function user_list()
{
    // cette fonction permet de récupérer tous les projets de l'utilisateur actuel
    $author_id = $_SESSION['id'];
    require('connect_db.php');
    $req = $db -> prepare('SELECT * FROM plans WHERE author_id=? ORDER BY created_at ASC');
    $req->execute(array($author_id));
    return $req;
}

function get_project($id)
{
    // cette fonction peret de récupérer un projet a partir de son identifiant(id)
    // elle sert lors de la modification d'un projet
    require('connect_db.php');
    $req = $db -> prepare('SELECT * FROM plans WHERE id=?');
    $req->execute(array($id));
    $project = $req-> fetch();
    return $project;
}

function get_author($id)
{   // cette fonction permet de récuperer un utilisateur avec son identifiant(id);
    require('connect_db.php'); // récupération de l'objet de connection
    $req = $db->prepare('SELECT username FROM users WHERE id=?');
    $req -> execute(array($id));
    $user = $req->fetch();
    return $user;
}

function download() // fonction de telechargement d'un ficheier
{
    if (isset($_GET['fls'])) {
        $q = urldecode($_GET['fls']); // recupéraion du chemin d'accès du fichier
        $file = ("$q"); 
        $type = filetype($file); // recupération de l'extention du fichier
        $name = basename($file); // récuperation du nom du fichier
        header("Content-Type: " . $type); // spécification du tupe de fichier à télécharger 
        header("Cotent-Length: " . filesize($file)); // spécification de la taille du fichier
        header("Content-Disposition: attachment; filename=" . $name);

        readfile($file); // telecargement du fichier
    }
}

/*
function cutter($text) //focntion pour raccourcire la description d'un projet pour n'afficher que ls 20 premier mots de la description
{ // cette fonction ne sera plus utilitisé vu la refonte de l'architechture
    // en realité, Juste une partie de la description d'un projet derait être affiché puis le reste serait affiché sur la page détails
    // Mais avec l'architecture actuel la page d'étail n'existe plus
    $short_text = implode(' ', explode(' ', $text, 20));
    return $short_text;
}*/

function last() // fonction permettant de récupérer les derniers projets ajoutés n fontion de leur date de création
{ // Les projet retournés par cette fonction compose le file  d'actualité de la page d'accueil
    require('connect_db.php'); // récupération de l'obet de connection à la base de données
    $req = $db->query('SELECT * FROM plans ORDER BY created_at ASC LIMIT 6'); // requete de récupération des derniers projets
    return $req;
}

function all() // fonction permettant de récupérer les derniers projets ajoutés n fontion de leur date de création
{ // Les projet retournés par cette fonction compose le file  d'actualité de la page d'accueil
    require('connect_db.php'); // récupération de l'obet de connection à la base de données
    $req = $db->query('SELECT * FROM plans ORDER BY created_at ASC'); // requete de récupération des derniers projets
    return $req;
}

function create_slug($urlString) // fonction permettant de créer des chaine de caractère unique servant d'idantifiant secondaire à un projet
// cette fonction prend en parametre la chaine de carachtère initiale et retourne une chaine finale dans la quelle les apostrophe, les acents
// et les espaces sont remplacé(es) par de tirets
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
    return $slug;
}

function add_project() // fontion d'ajout d'un nouveau projet
{
    require('uploader.php'); // recupération des fonction d'upload de fichier
    require('connect_db.php'); // recupération de l'objet de connection a la base de données
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['desc']) && !empty($_POST['desc']) && isset($_POST['loc']) && !empty($_POST['loc']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['ville']) && !empty($_POST['ville'])) {
        // Si tous les champs ont étés bien remplis
        $user_id = $_SESSION['id']; // id de l'utilisteur actuel
        $project = $_POST['name']; // nom du projet (spécifier pas l'utilisateur)
        $desc = $_POST['desc']; // description du projet
        $img_dir = "utils/media/img/"; // dossier de destination des images uploader
        $img_url = img_upload($img_dir); // execution de la fontion d'upload de l'image qui retourne le chemin de l'image
        $slug = create_slug($project); // exectution de la fonction de création de slug
        /* L'architechture initiale du site a été pensée de façon à ce que chaque projet ait une page détails. Ainsi un projet serait identifier 
           par la concaténation du slug et de l'id du projet.
        */
        $price = $_POST['price'];
        $loc = $_POST['loc'];
        $ville = $_POST['ville'];
        $req = $db->prepare('INSERT into plans (name, description, banner, author_id, slug, price, location, ville) VALUES(?,?,?,?,?,?,?,?)'); // enregistrement du nouveau projet dans la base de donnée
        $req->execute(array($project, $desc, $img_url, $user_id, $slug, $price, $loc, $ville));
        echo "<script>alert(\"Projet ajouté avec succes\")</script>"; // message a affiché en cas de succès

    }
}

function login() // fonction de connexion d'un utilisateur 
{
    require('connect_db.php'); //recuperation de l'objet de connection a la base de donnees


    if (isset($_POST['userid']) && !empty($_POST['userid']) && isset($_POST['pass']) && !empty($_POST['pass'])) // Verifier que tous les champs ont bien ete remplis - (forme de sécurite anti sql injection)
    {
        $log_check = $db->prepare('SELECT id, username, email, password FROM users WHERE username=? OR email=?'); // Recuperer l'utlisateur dont le nom d'utilisateur ou l'email est celui spécifié par l'utlisateur

        // l'utilisateur à la possibilite de se connecter soit avec son nom d'utilisateur soit avec son adresse electronique

        $log_check->execute(array($_POST['userid'], $_POST['userid'],)); // Recuperer l'utlisateur dont le nom d'utilisateur ou l'email est celui spécifié par l'utlisateur

        if ($log_check->rowcount() == 1) // Verifier si l'utilisateur exist
        {

            while ($user = $log_check->fetch()) {
                if (sha1($_POST['pass']) == $user['password']) // verifier si le mot de passe est correcte
                {
                    // Enregistrer les information de l'utilisateur dans une session
                    $_SESSION['id'] = $user['id']; // identifiant de l'utilisteur - (cet id est un numero unique. ~ clé primaire de la table users)
                    $_SESSION['username'] = $user['username']; // nom d'utilisateur de l'utilisateur 
                    $_SESSION['email'] = $user['email']; // adresse electronique de l'utilsateur
                    $_SESSION['ville'] = $user['ville'];
                    header('location:index.php?id=1'); //rediriger l'utiilisateur sur la page d'acceuil
                } else {
                    echo "<script>alert(\"Nom d'utilisateur ou mot de passe incorect\")</script>"; // message d'errreur pour le mot de passe incorrect
                }
            }
        } else {
            echo "<script>alert(\"Nom d'utilisateur ou mot de passe incorrect\")</script>"; // message d'erreur pour le nom d'utilisateur incorrect
            // Les deux messages identiques empeche un utilisateur malveillant de connaitre les identifiants enregistres dans la base de données

        }
    } else {
        echo "<script>alert(\"Tous les champs sont requis\")</script>";
        // message d'erreur pour les champs non

    }
}


function create_user() // fonction de creation d'un utilisateur
{
    require('connect_db.php'); // recuperation de l'objet de connection à la base de donnees

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['mail']) && !empty($_POST['mail'])  && isset($_POST['pass1']) && !empty($_POST['pass1'])  && isset($_POST['pass2']) && !empty($_POST['pass2']) && isset($_POST['ville']) && !empty($_POST['ville']))
    // verifier si tous les champs sont bien remplis
    {
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $ville = $_POST['ville'];
        $check = $db->prepare('SELECT id FROM users WHERE username=?'); // Selectionner l'utilisateur dont le nom d'utilisateur correspond a celui entrer par l'utilisateur
        $check->execute(array($username));
        if ($check->rowcount() != 0) // Verifier si un utilisateur à été trouvé
        {   // si oui afficher ce message d'erreur
            echo "<script>alert(\"Ce nom d'utilisateur est déjà utilisé \")</script>"; //
        } else { // si aucun utilisateur n'a été trouvé, 
            $check = $db->prepare('SELECT id FROM users WHERE email=?');  // Selectionner l'utilisateur dont le mail correspond a celui entrer par l'utilisateur
            $check->execute(array($mail));
            if ($check->rowcount() != 0) // verifier si un utilisateur à été trouvé
            {
                // si c'est le cas afficher ce message d'erreur
                echo "<script>alert(\"Cette adresse mail est déjà utilisée \")</script>";
            } else { // si aucun utilisateur ne correspond à ces identifiants
                if ($_POST['pass1'] == $_POST['pass2']) // vérifié si les deux mots de passe entrer par l'utilisateur sont corrects

                {   // si oui, 
                    $pass = sha1($_POST['pass1']); // crypter le mot de passe de l'utilisateur avec l'agorithme de hashage sha1
                    $create_user = $db->prepare('INSERT INTO users (username, email, password, ville) VALUES(?,?,?,?)'); // créer le nouvel utilisateur
                    $create_user->execute(array($username, $mail, $pass, $ville));
                    header('location:login.php'); // rediriger l'utilisateur ver la page de connection

                } else // si les deux mot de passe ne sont pas identiques : 
                {
                    // afficher ce message d'erreur
                    echo "<script>alert(\"Les mots de passe ne sont pas identiques\")</script>";
                }
            }
        }
    } else { // si les champs sont pas bien remplis afficher le message suivant 
        echo "<script>alert(\"Tous les champs sont requis \")</script>";
    }
}
