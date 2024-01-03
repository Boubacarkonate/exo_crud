<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css -->
    <style>
        h1,h2 {text-align: center;}
        h2 {font-size: large;}
        h2 .color_letter {color: red;font-size: 130%; }
    </style>
</head>

<body>
    <!-- appel du fichier crud.php pour l'utilise -->
    <?php require_once "crud.php" ?>

   

    <div class="container">

<!--alert boostrap. A la place d'écrire la couleur de l'alerte, je la remplace par la $_SESSION[msg_type] déclaré dans crud.php-->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<? $_SESSION['msg_type']; ?>" role="alert"> 
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    
        <div class="row">
            <div class="col-12">
                <h1>CRUD</h1>
                <h2><span class="color_letter">C</span>reate <span class="color_letter">R</span>ead <span class="color_letter">U</span>pdate <span class="color_letter">D</span>elete</h2>
            </div>
        </div> <!----->
        <div class="row">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'cda_contact') or die(mysqli_error($mysqli));     //connexion à la BD
            $result = $mysqli->query("SELECT * FROM crud") or die($mysqli->error);                          //afficher toutes les données = READ 
            // print_r($result);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>VILLE</th>
                        <th>PHOTO</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <?php while($row = $result->fetch_assoc()) :?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><img src="upload/<?php echo $row['photo']; ?>" alt="" class="img-fluid" style="width: :20%;"></td>
                        <td>
                            <a href="crud.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">SUPPRIMER</a>
                        </td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-warning">MODIFIER</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
            </table>
        </div>
        <div class="row">
            <form action="crud.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="" placeholder="Votre nom" value="<?php echo $name;  ?>">
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" class="form-control" id="" placeholder="Votre ville"  value="<?php echo $city;  ?>">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo :</label>
                    <input type="file" name="photo" class="form-control" id="">
                    <small> <?php echo $photo;?></small>
                </div>

                <?php if ($update == true) : ?> 
                    <button type="submit" name="update"  class="btn btn-primary"> UPDATE</button>
               <?php else : ?>
                <button type="submit" name="save" class="btn btn-primary">CREATE</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


