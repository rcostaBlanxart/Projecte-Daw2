<?php include ("../../Model/Cursos/ModelOptionEstatCurs.php");

$nouCurs=new ModelOptionEstatCurs($conn);

$result = $nouCurs->listadoEstats();

$optionEstats = "";
while($estat=$result->fetch_assoc()) {
    $IdEstat = $estat["id_estat_curs"];
    $estat = $estat["estat"];

    $optionEstats .= "<option value=".$IdEstat.">".$estat."</option>";
}
echo $optionEstats;