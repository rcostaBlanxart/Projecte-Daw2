<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Editar horari</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
      ::selection {   
        background: orange;
      }
      .crear_curs{
          margin: 2rem;
      }
    </style>
  </head>
  <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php");
    if($_SESSION["usuari"]==1){ ?> 

    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Editar horari</h1>
            <p class="lead text-muted">Aquesta pàgina proporciona la funcionalitat d'editar horaris.</p>
            <?php 
              if(isset($_SESSION["ErrorEditarHorari"]) && $_SESSION["ErrorEditarHorari"] == 1){
                  echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                  $_SESSION["ErrorEditarHorari"] = 0;
              } ?>
          </div>
        </div>
    </section>
        
    <!-- SECTION FORM -->
    
    <form action='../../Controller/Horaris/ControllerEditarHorari.php' method='POST'>
      <section class='py-5 text-center container'>
        

        <div class='input-group mb-3'>
            <div class='input-group-prepend'> </div>
            <label for='id_dia' class='m-2'>Dia</label> 
            <select name='id_dia' class='rounded'>
                <option value=''></option>
                <?php include ('../../Controller/Cursos/ControllerOptionDies.php') ?>
            </select>
        </div>

        <div class='input-group mb-3'>
            <div class='input-group-prepend'> </div>
            <label for='id_franja' class='m-2'>Franja</label> 
            <select name='id_franja' class='rounded'>
                <option value=''></option>
                <?php include ('../../Controller/Cursos/ControllerOptionFranjes.php') ?>
            </select>
        </div>

          <input type='hidden' name='id_horari' value="<?= $_GET['id'] ?>">

          <div class='crear_curs'>
              <p><input type='submit' class='btn btn-warning' value='Editar horari'></p>
          </div>
      </section>
  </form>
</body>
</html>
<?php
} else {
    header("location: 404.php");
} ?>