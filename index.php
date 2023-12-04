<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        h1,
        h2 {
            text-align: center;
        }

        h2 {
            font-size: large;
        }
        h2 .color_letter {
            color: red;
            font-size: 130%;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>CRUD</h1>
                <h2><span class="color_letter">C</span>reate <span class="color_letter">R</span>ead <span class="color_letter">U</span>pdate <span class="color_letter">D</span>elete</h2>
            </div>
            <div class="row">
                <form action="crud.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="" placeholder="Votre nom">
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" name="ville" class="form-control" id="" placeholder="Votre ville">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo :</label>
                        <input type="file" name="photo" class="form-control" id="">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">CREATE</button>

                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>