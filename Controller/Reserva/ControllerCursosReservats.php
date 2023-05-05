<?php
include ('../../Model/Reserva/ModelCursosReservats.php'); 

if(isset($_SESSION["email"])){
    $email=$_SESSION["email"];
    $result=mostrar_cursos_reservats($email);
    $count = $result->num_rows;
}





if (!isset($_SESSION["usuari"])){
    echo '<hr><br>
    <h2>Has de iniciar sessió per poder reservar un curs!</h2>
    <h2>Inicia Sessió aquí:</h2>
    <h2><a href="login.php"><input type="button" class="btn btn-outline-dark" value="Iniciar Sessió"></a></h2>
    ';
}

else if ($count == 0) {
    echo '<hr><br>
    <h2>Encara no has reservat cap curs!</h2>
    <h2>Consulta el nostre catàleg:</h2>
    <h2><a href="home_page.php#cursos"><input type="button" class="btn btn-success" value="Pàgina Pricipal"></a></h2>
    ';
}

else {
    $div_cursos = "";
    $total = 0; 
    while($curs=$result->fetch_assoc()) {
        $nombreCurso = $curs["nom_curs"];
        $id_reserva = $curs["id_reserva"];
        $preu = $curs["preu"];
        $total += $preu;

        $div_cursos .= '     <a class="div_curs" href="home_page.php#cursos">
        <div class="curs col-sm-6 mx-auto">
            <h2 class="titol_curs">'.$nombreCurso.'</h2>
            <h4 class="titol_curs">'.$preu.'€</h4>
            <form action="../../Controller/Reserva/ControllerEliminarReserva.php" method="POST">
            <input type="hidden" name="id_reserva" value='.$id_reserva.'>
            <p><input type="submit" class="btn btn-outline-danger" value="Eliminar Reserva"></p>
            </form>
        </div>
      </a>';
    }
    
    $div_cursos .= '<h4>Total: '.$total.'€</h4>';
    echo $div_cursos;
}
