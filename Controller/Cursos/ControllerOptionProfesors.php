<?php include ("../../Model/Cursos/ModelOptionProfesors.php");

$nouCurs=new CrearOptionsProfessors($conn);

$result = $nouCurs->listadoProfesors();

$optionProfessor = "";
while($professor=$result->fetch_assoc()) {
    $IdProfessor = $professor["id_profesor"];
    $nomProfessor = $professor["nom"];
<<<<<<< HEAD
    $cognomProfessor = $professor["cognom"];

    $optionProfessor .= "<option value=".$IdProfessor.">".$nomProfessor." ".$cognomProfessor."</option>";
=======

    $optionProfessor .= "<option value=".$IdProfessor.">".$nomProfessor."</option>";
>>>>>>> d35ef1f3735508b4b5f23be2bfe66a4081bd8d99
}
echo $optionProfessor;