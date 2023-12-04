<?php

// var_dump($_POST);

//connexion à la base de données avec new mysqli
/*
new mysqli est une approche orientée objet pour établir une connexion MySQLi.
Elle crée un nouvel objet de la classe mysqli.
Elle prend généralement quatre paramètres : l'hôte (localhost), le nom d'utilisateur, le mot de passe et le nom de la base de données.
Elle peut également prendre deux paramètres supplémentaires pour spécifier le port et le socket, mais ils sont facultatifs.
 */
$connect = new mysqli('localhost', 'root', '', 'cda_contact');

if (isset($_POST['save'])) {
    $name= $_POST['nom'];
    $city= $_POST['ville'];

    $photo= $_FILES['photo']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir.basename($photo);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensionAccepted_array = array("jpg", "jpeg", "png", "pdf");     //mettre dans un array les extensions des fichiers acceptés
    if (in_array($imageFileType, $extensionAccepted_array)) {
        $connect->query("INSERT INTO crud (name, city, photo) VALUES ('$name', '$city', '".$photo."')") or die($connect->error);
       
        move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$photo);
        // echo "succes";

        //je définis un clef 'message' à mon $_SESSION avec sa valeur "Données ajoutées
        $_SESSION['message'] = "Données ajoutées";
        $_SESSION['msg_type'] = "success";
        header("location:index.php");
    }
}
