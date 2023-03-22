<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Pàgina Principal</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scroll.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
      ::selection {   
        background: orange;
      }

      body {
        margin: 0;
        padding: 0;
      }

      .header {
  height: 100vh;
  background-color: rgba(51, 51, 51, 0.8);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.header::before {
  content: "";
  background-image: url("../img/biblioteca.webp");
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0.5;
  z-index: -1;
}

      
    </style>
  </head>
  <body>
  <!-- NAVBAR & DROPDOWN-->
  <?php include ("../../Controller/Navbar/navbar.php") ?>

  <!-- HEADER -->

  <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-dark text-white vh-100">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5 p-lg-5 my-5">
          <h1 class="display-4 font-weight-normal">Formació Profesional</h1>
          <p class="lead font-weight-normal">El teu futur comença aquí: Descobreix el nostre ampli catàleg de cursos i comença a construir el teu camí cap a l'èxit.</p>
          <a class="btn btn-outline-secondary" href="#cursos">Cursos</a>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
      </div>
    </div>
  </div> -->

  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-7 mx-auto text-center">
          <h1 class="display-4 font-weight-normal">Formació Professional</h1>
          <p class="lead font-weight-normal">El teu futur comença aquí: Descobreix el nostre ampli catàleg de cursos i comença a construir el teu camí cap a l'èxit.</p>
          <a class="btn btn-outline-light" href="#cursos">Cursos</a>
        </div>
      </div>
    </div>
  </div>

   
    <!-- SECTION CURSOS -->
    <section id="cursos" class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Oferta de cursos</h1>
          <p class="lead text-muted">Aquests són el cursos que tenim disponibles.</p>

        </div>
      </div>
    </section>
    <!-- CARDS  -->
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php 
          
          include ('../../Controller/Cursos/ControllerCursos.php');
        
        ?>
      </div>
    </div>
    <!-- FOOTER -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Formació Professional</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pàgina Principal</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Cursos</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Atenció al client</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre nosaltres</a></li>
        </ul>
      </footer>
    </div>

  </body>
</html>