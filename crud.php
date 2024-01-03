<?php

// var_dump($_POST);

//connexion à la base de données avec new mysqli
/*
new mysqli est une approche orientée objet pour établir une connexion MySQLi.
Elle crée un nouvel objet de la classe mysqli.
Elle prend généralement quatre paramètres : l'hôte (localhost), le nom d'utilisateur, le mot de passe et le nom de la base de données.
Elle peut également prendre deux paramètres supplémentaires pour spécifier le port et le socket, mais ils sont facultatifs.
 */
session_start();

//connexion à la base de données
$connect = new mysqli('localhost', 'root', '', 'cda_contact');

//initialisation des variables à 0 ou vide. Ainsi, le formaulaire sera vide à chaque fois qu'on l'initialisera.
$update = false;
$name ='';
$city = '';
$photo = '';
$id=0;

                        ///////////////////   CRUD    ///////////////////////
                                //  Create Read Update Delete //
                        

//créer une donnée = CREATE
if (isset($_POST['save'])) {
    $name = $_POST['nom'];
    $city = $_POST['ville'];

    $photo = $_FILES['photo']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($photo);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensionAccepted_array = array("jpg", "jpeg", "png", "pdf");     //mettre dans un array les extensions des fichiers acceptés
    if (in_array($imageFileType, $extensionAccepted_array)) {
        $connect->query("INSERT INTO crud (name, city, photo) VALUES ('$name', '$city', '" . $photo . "')") or die($connect->error);

        move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $photo);
        // echo "succes";

        //je définis un clef 'message' à mon $_SESSION avec sa valeur "Données ajoutées 
        $_SESSION['message'] = "Données ajoutées";
        $_SESSION['msg_type'] = "success";

        //redirection vers la page principale index.php après enregistrer des données en base de données
        header("location:index.php");
    }
}

                            /////////////////////////////////////////////////

//supprimer une donnée = DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $connect->query("DELETE FROM crud WHERE id = $id") or die($connect->error);
    $_SESSION['message'] = "Données supprimées";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
}

                            ///////////////////////////////////////////////////

//modifier une donnée = UPDATE
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $connect->query("SELECT * FROM crud WHERE id=$id") or die($connect->error);
    $update = true;
    $verify = mysqli_num_rows($result);
    if ($verify == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $city = $row['city'];
        $photo = $row['photo'];
    }
}

if (isset($_POST[ 'update'])) {
    $id = $_POST['id'];
    $name = $_POST['nom'];
    $city = $_POST['ville'];
    $photo = $_FILES['photo']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($photo);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensionAccepted_array = array("jpg", "jpeg", "png", "pdf");     //mettre dans un array les extensions des fichiers acceptés
    if (in_array($imageFileType, $extensionAccepted_array)) {
        $connect->query("UPDATE crud  SET name='$name', city='$city', photo='$photo' WHERE id=$id")  or die($connect->error);

        move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/' . $photo);
        // echo "succes";

        //je définis un clef 'message' à mon $_SESSION avec sa valeur "Données ajoutées
        $_SESSION['message'] = "Données ajoutées";
        $_SESSION['msg_type'] = "success";
        header("location:index.php");
    }

    
}
