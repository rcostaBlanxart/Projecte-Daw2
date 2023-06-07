<?php

include ("../../Model/Conexion/connexio_bd.php");

$IdHorari = $_POST["id"];

$sql=$conn->prepare("DELETE FROM horarios WHERE id_horario = ?");
$sql->bind_param("i",$IdHorari);
$sql->execute();