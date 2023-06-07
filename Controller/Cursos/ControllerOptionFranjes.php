<?php include ("../../Model/Cursos/ModelOptionFranjes.php");

$nouCurs=new ModelOptionFranjes($conn);

$result = $nouCurs->listadoFranjes();

$optionFranjes = "";
while($row=$result->fetch_assoc()) {
    $IdFranjes = $row["id_franja"];
    $franja = $row["franja"];

    $optionFranjes .= "<option value=".$IdFranjes.">".$franja."</option>";
}
echo $optionFranjes;