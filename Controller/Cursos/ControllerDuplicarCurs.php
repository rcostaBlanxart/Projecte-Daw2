<?php
include ('../../Model/Cursos/ModelDuplicarCurs.php');

session_start();

$duplicarCurs = new DuplicarCurs($conn);

$id_curs=$_REQUEST["id_curs"];

$duplicarCurs->duplicarCurs($id_curs);

$_SESSION["duplicar"]=1;

header("Location: ../../Views/html/panell_cursos.php"); 

mysqli_close($conn);