<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Login</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/font.css">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../css/login1.css">
</head>
<body class="container-fluid">
<!-- img -->
    <main class="row">

        <section class="col-md-6" id="panel-left">
            <div class="container align-self-center" style="margin-top:-150px; user-select: none;">
            <div class="row mt-5">                    
                    <div class="col-12 logo-container d-flex justify-content-center">
                        <img src="../img/logo1.png" alt="l1">
                    </div>
                </div>
                <div class="row">
                    <h1 class="col-12 text-center">APLICATION<br>LOGIN PAGE</h1>
                </div>
            </div>
        </section>


        <section class="col-md-6" id="panel-right">
            <div class="container">
                <div class="row mb-5">
                    <h2 class="col-12 text-center" style="color:black;">Login</h2>
                    <?php
                        session_start();
                        if(isset($_SESSION["error"]) && $_SESSION["error"] == 1){
                            echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>EL CORREU O LA CONTRASENYA SÓN INCORRECTES</div>";
                            $_SESSION["error"] = 0;
                        }
                    ?>

                </div>



                <div class="row">                    
                    <form action="../../Controller/Login/ControllerLogin.php" method="post" class="col-12 col-md-8 offset-md-2">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Mail">

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contrasenya">
                        </div>
                        <div class="form-group text-center pt-4">
                            <input type="submit" id="loginbtn" class="btn" name="logbtn" value="Iniciar Sessió">
                            <a href="register.php"><input type="button" id="loginbtn2" class="btn" value="Registrar-se"></a>
                        </div>
                    </form>
                </div>
                <div class="row mt-5">
                    <div class="col-12 links text-center">
                        <div>
                            <!-- <a href="Password/oblidar.php">He oblidat la contrasenya</a> -->
                        </div>        
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>