<?php

include ('../../Model/Horaris/ModelPanellHoraris.php'); 

$mostrarHoraris = new ModelPanellHoraris($conn);

$result = $mostrarHoraris->mostrarHoraris();
// Declarem la variable $div_cusos com a una cadena de string buïda
$div_horaris = '
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Dia</th>
      <th scope="col">Franja</th>
      <th scope="col">Curs</th>
      <th scope="col">Estat</th>
    </tr>
  </thead>
  <tbody>';
// Fem un bucle per que creï aquesta estructura HTML per a cada contingut existent a la taula contingut
while($row=$result->fetch_assoc()) {
    $IdHorari = $row["id_horario"];
    $franja = $row["franja"];
    $dia = $row["dia"];
    $curs = $row["nom_curs"];
    $estatCurs = $row["estat"];

    $div_horaris .= "
    <tr>
        <td>".$IdHorari."</td>
        <td>".$dia."</td>
        <td>".$franja."</td>
        <td>".$curs."</td>
        <td>".$estatCurs."</td>
        <td><button type='button' class='btn btn-warning'><a href='editarHorari.php?id=".$IdHorari."'>Editar</a></button></td>
        <td><button type='button' class='btn btn-danger' onclick='eliminarHorari(".$IdHorari.");'>Eliminar</button></td>
    </tr>";
}
$div_horaris .= "</tbody></table>";
echo $div_horaris;


?>