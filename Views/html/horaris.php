<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Cursos reservats</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/panells.css">
    <link rel="stylesheet" href="../css/font.css">
  </head>
  <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php");
    if($_SESSION["usuari"]==1){ ?> 
    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Horaris</h1>
            <p class="lead text-muted">Crea els horaris per al curs.</p>
                        <?php
              if(isset($_SESSION["ErrorCrearHoraris"]) && $_SESSION["ErrorCrearHoraris"] == 1){
                  echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                  $_SESSION["ErrorCrearHoraris"] = 0;
              } ?>
          </div>
        </div>

        <div class="curs col-sm-6 mx-auto">
            <h2 class="titol_curs"></h2>
            <form action="../../Controller/Cursos/ControllerHoraris.php" method="POST">

                <div class="input-group mb-3">
                    <label for="dia" class="m-2">Dia:</label> 
                    <select name="dia" class="rounded">
                        <option value=""></option>
                        <?php include ("../../Controller/Cursos/ControllerOptionDies.php"); ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label for="franja" class="m-2">Franja horaria:</label> 
                    <select name="franja" class="rounded">
                        <option value=""></option>
                        <?php include ("../../Controller/Cursos/ControllerOptionFranjes.php"); ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label for="contingut" class="m-2">Franja horaria:</label> 
                    <select name="contingut" class="rounded">
                        <option value=""></option>
                        <?php include ("../../Controller/Cursos/ControllerOptionContinguts.php"); ?>
                    </select>
                </div>

                <input type="hidden" value=<?php echo $_GET["id"]?> name="id_curs">
        </div>
            <br>
            <input type="submit" class="btn btn-warning" value="Afegir Horari">
            <a href="pujar_img.php?id=<?php echo $_GET["id"] ?>"> <input type="button" class="btn btn-info" value="Següent"> </a>
            </form>
    </section>
</body>
</html>
<?php
} else {
    header("location: 404.php");
} ?>