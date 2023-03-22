<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title>Modificar Imatge</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../css/pujar_img.css">
        <link rel="stylesheet" href="../css/font.css">
</head>
    <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php") ?>

    <div class="container text-center">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Puja una imatge</h1>
                <p class="lead text-muted">Escull una imatge que sigui en format jpg, jpeg, png, gif</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <form method="post" enctype="multipart/form-data" class="form-container">
                <input type="file" name="file" id="file-upload">
                <input type="submit" name="submit" value="Subir archivo">
            </form>
        </div>
    </div>

    <div class="form-check mb-3 text-center">
        <div id="error-message" style="color: red;"></div>
    </div>

<<<<<<< HEAD
    <div style="text-align: center;">
        <a class='btn btn-info' href='panell_cursos.php' style='text-decoration: none; color: black;'>Tornar al panell</a>
    </div>

=======
>>>>>>> d35ef1f3735508b4b5f23be2bfe66a4081bd8d99
    <?php include ("../../Controller/Cursos/ControllerUpdateImg.php") ?>
    <script src="../js/pujar_img.js"></script>
</body>
</html>