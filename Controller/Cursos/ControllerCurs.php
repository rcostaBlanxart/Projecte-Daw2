<?php

include ('../../Model/Cursos/ModelCurs.php');
include ('../../Model/Reserva/ModelPlaces.php');
include ('../../Model/Cursos/ModelHorari.php');

include ('../../Model/Reserva/ModelReservesCurs.php');

$mostrarPlaces= new MostrarPlaces($conn);
$mostrarCurs = new ModelCurs($conn);
$mostrarHorari = new ModelHorari($conn);
$mostrarReserves = new ModelReservesCurs($conn);

$id_curs = $_GET["id"];

$resultPlaces=$mostrarPlaces->places($id_curs);
$placesDisponibles = $resultPlaces->fetch_assoc()["placesDisponibles"];

$result = $mostrarCurs->mostrarCurs($id_curs);
$row = $result["row"];
$array_num = $result["array_num"];
$array = $result["array"];
$img = $result;
    // Declarem la variable $div_cusos com a una cadena de string buïda
    $div_cursos = "";
    
    if($row) {
        $IdCurso = $row["id_curs"];
        $nombreCurso = $row["nom_curs"];
        $descripcionCurso = $row["curs_descripcio"];
        $precioHora = $row["preu"];
        $dataInici = $row["data_inici"];
        $dataFi = $row["data_fi"];
        $imagenCurso = "../img/".$img["img"][0]["img"]."";

        $div_cursos .= "<div class='row g-5 content'>
        <div class='col-md-8'>
        <h2 class='pb-4 mb-4 fst-italic border-bottom'>
            ".$nombreCurso."
        </h2>
    
        <article class='blog-post'>
            <h3>Descripció</h3>
            <p>".$descripcionCurso."</p>
            <p>Duració del curs: ".$dataInici." - ".$dataFi."</p>
        </article> 

        <article class='blog-post'>
            <h3>Continguts</h3>
            <p>Los contenidos que se enseñaran en este curso son los siguientes:</p>
            <table class='table'>
            <thead>
                <tr>
                <th>Contingut</th>
                <th>Descripció del contingut</th>
                <th>Professor</th>
                <th>Hores</th>
                </tr>
            </thead>
            <tbody>";

            for($i=0;$i<$array_num;$i++) {
                $row2 = $array[$i];
                $nombreContenido = $row2["nom_contingut"];
                $contingutsDescripcio = $row2["continguts_descripcio"];
                $horas = $row2["hores"];
                $nombreProfesor = $row2["nom"];
                $cognomProfesor = $row2["cognom"];
                
                $div_cursos .= "<tr>
                <td>".$nombreContenido."</td>
                <td>".$contingutsDescripcio."</td>
                <td>".$nombreProfesor." ".$cognomProfesor."</td>
                <td>".$horas."</td>
                </tr>";
            }
            $div_cursos .= "</tfoot></table>
    
            <p>Precio total del curso: ".$precioHora."€</p>
        </article>   
        </div>


        <div class='col-md-4'>
            <div class='position-sticky' style='top: 2rem;'>

    
            <div class='p-4'>
                <img src='".$imagenCurso."' alt='Curs àngles' style='width: 25rem;'>
            </div>
    
            <div class='p-4 mb-3 bg-light rounded'>
                <h4 class='fst-italic'>Reserva</h4>
                <p>Places Disponibles: ".$placesDisponibles." </p>
                <input type='hidden' value='".$placesDisponibles."' id='valorPlaces'>
                <p class='mb-0'>Reserva una plaça amb el teu compte per a que el professor rebri la teva infomació per contactar amb tú i començar el curs.</p>
                <br>
                <form action='../../Controller/Reserva/ControllerReserva.php' method='POST'>
                <input type='hidden' id='inputUrlValue' name='id'>
                <script>
                    const url = window.location.href;
                    const urlParams = new URLSearchParams(new URL(url).search);
                    const idValue = urlParams.get('id');
                    document.getElementById('inputUrlValue').value = idValue;
                </script>
                <input type='submit' id='reserva'  name='reserva' value='Reserva'>
                <script>
                    var valor = document.getElementById('valorPlaces').value;
                    if(valor==0){
                        document.getElementById('reserva').disabled=true;
                        document.getElementById('reserva').style='opacity:30%';
                    }
                    
                </script>
                </form>
               
            </div>

            </div>
        </div>";
    }
    echo $div_cursos; ?>
    <h2>Horari</h2> <?php
    // Dies de la setmana
    $rsDies = $mostrarHorari->listadoDies();
    $dies = [];
    while ($dia=$rsDies->fetch_assoc()) {
        $dies[] = $dia;
    } 
    
    // Franjes horaries
    $rsFranjes = $mostrarHorari->listadoFranjes();
    $franjes = [];
    while ($franja=$rsFranjes->fetch_assoc()) {
        $franjes[] = $franja;
    } 
    
    // Continguts 
    $rsContiguts = $mostrarHorari->listadoContinguts($id_curs);
    $horaris = [];
    while ($horari=$rsContiguts->fetch_assoc()) {
        $horaris[] = $horari;
    } ?>
    
    <div class="row mb-3 text-center">

    <!-- Mostrar los días -->
    <div class="col-md-2 themed-grid-col text-center"></div> <?php
    foreach ($dies as $dia) { ?>
        <div class="col-md-2 themed-grid-col text-center" id_dia='<?= $dia["id_dia_semana"] ?>'><?= $dia["dia"] ?></div> <?php
    } ?>
    </div> <?php

    // Mostrar las horas y las celdas de la tabla
    foreach ($franjes as $franja) { ?>
        <div class="row mb-3 text-center">
        <div class="col-md-2 themed-grid-col text-center" IDFranja='<?= $franja["id_franja"] ?>'><?= $franja["franja"] ?></div> <?php
        // Generar celdas para cada día
        foreach ($dies as $dia) { ?>
            <div class="col-md-2 themed-grid-col text-center" id_dia='<?= $dia["id_dia_semana"] ?>' id_franja='<?= $franja["franja"] ?>'> <?php
            foreach ($horaris as $horari) {
                if($dia["id_dia_semana"] == $horari["id_dia_semana"] && $franja["id_franja"] == $horari["id_franja"]) {
                    echo $horari["nom_contingut"]."<hr>";
                }
            }
            ?>
            </div> <?php
        } ?>
        </div> <?php
    } 

if(isset($_SESSION["usuari"]) && $_SESSION["usuari"] == 1) {
    $rsReserves = $mostrarReserves->reservesCurs($id_curs);
    $reserves = [];
    while($reserva=$rsReserves->fetch_assoc()) {
        $reserves[] = $reserva;
    } ?>
    <h2>Registre d'alumnes</h2>
    <table id="tablaReserves">
        <thead>
            <tr>
                <th>Nom usuari</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>DNI</th>
                <th>email</th>
                <th>Núm. telèfon</th>
            </tr>
        </thead>
        <tbody> <?php
            foreach($reserves as $res) { ?>
                <tr>
                    <td><?= $res["username"] ?></td>
                    <td><?= $res["nom"] ?></td>
                    <td><?= $res["cognom"] ?></td>
                    <td><?= $res["dni"] ?></td>
                    <td><?= $res["email"] ?></td>
                    <td><?= $res["numero_telefono"] ?></td>
                </tr> <?php
            } ?>
        </tbody>
    </table> <?php
}