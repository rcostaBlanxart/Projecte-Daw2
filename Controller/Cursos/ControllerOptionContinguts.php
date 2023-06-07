<?php include ("../../Model/Cursos/ModelOptionContinguts.php");

$nouCurs=new ModelOptionsContinguts($conn);

$result = $nouCurs->listadoContinguts();

$optionContinguts = "";
while($row=$result->fetch_assoc()) {
    $IdContingut = $row["id_contingut"];
    $nomContingut = $row["nom_contingut"];

    $optionContinguts .= "<option value=".$IdContingut.">".$nomContingut."</option>";
}
echo $optionContinguts;