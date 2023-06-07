<?php

include ('../../Model/Cursos/ModelPanellCursos.php'); 

$mostrarCurs = new ModelPanellCursos($conn);

$estatCurs = "";
$estatCurs = $_POST["estatCurs"];

$result = $mostrarCurs->mostrarCurs($estatCurs);

// Declarem la variable $div_cusos com a una cadena de string buïda
$div_cursos = "";
// Fem un bucle per que creï aquesta estructura HTML per a cada curs existent a la taula curs
while($curs=$result->fetch_assoc()) {
    $IdCurso = $curs["id_curs"];
    $nombreCurso = $curs["nom_curs"];
    $estat = $curs["estat"];

    $div_cursos .= 
    "<a href='curs.php?id=".$IdCurso."'>
        <section class='py-5 text-center container'>
            <div class='div_cursos col-sm-6 mx-auto'>
                <h2 class='fw-normal'>".$nombreCurso."</h2>
                <p class='fw-normal'>Estat: ".$estat."</p>
                <p><a class='btn btn-warning' href='editar_curs.php?id=".$IdCurso."'>Editar curs</a></p>
                <form action='../../Controller/Cursos/ControllerDuplicarCurs.php?id_curs=".$IdCurso."' method='POST'>
                    <p><input type='submit' class='btn btn-info' name='duplicar' value='Duplicar curs'></p>
                </form>
                <form action='../../Controller/Cursos/ControllerEliminarCurs.php' method='POST'>
                <input type='hidden' name='id_curs' value=".$IdCurso.">
                <p><input type='button' onclick='mostrar_confirmacion(\"confirmacion_".$IdCurso."\")' class='btn btn-danger' value='Eliminar curs'></p>
                <div id='confirmacion_".$IdCurso."' style='display:none; padding:15px; widht: 300px;'>
                    <p>Estàs segur que vols eliminar aquest curs?</p>
                    <p>És possible que aquest curs tingui informació associada.<br>Aquesta informació s'esborrarà també.</p>
                    <input type='submit' class='btn btn-danger' name='eliminar' value='Eliminar curs'>
                    <input type='button' class='btn btn-success' onclick='ocultar_confirmacion(\"confirmacion_".$IdCurso."\")' value='Cancel·lar'>
                </div>
                </form>

            </div>
        </section>
    </a>";

}
echo $div_cursos;


?>