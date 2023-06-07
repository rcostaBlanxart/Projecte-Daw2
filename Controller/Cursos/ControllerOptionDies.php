<?php include ("../../Model/Cursos/ModelOptionDies.php");

$nouCurs=new ModelOptionDies($conn);

$result = $nouCurs->listadoDies();

$optionDies = "";
while($row=$result->fetch_assoc()) {
    $IdDia = $row["id_dia_semana"];
    $dia = $row["dia"];

    $optionDies .= "<option value=".$IdDia.">".$dia."</option>";
}
echo $optionDies;