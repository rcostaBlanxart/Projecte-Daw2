<?php
// Este script se ejecuta cada dia a las 00:00 con crontab
// * * * * * /usr/bin/php8.1 /var/www/html/Proyecto/PROJECTE\ DAW\ 2/Model/Crontab/actualizarEstatCursos.php
// crontab -l per veure la comanda
$conn=mysqli_connect("localhost","joel","EwnizEv5","projecte");

if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
}

// Obtener la fecha actual
$currentDate = date("Y-m-d");

// Actualizar el estado de los cursos los cuales la fecha de inicio haya pasado
$sql = "UPDATE curs SET estat = 2 WHERE data_inici < '$currentDate' AND estat != 3";
$conn->query($sql);

// Actualizar el estado de los cursos los cuales la fecha de finalización haya pasado
$sql = "UPDATE curs SET estat = 3 WHERE data_fi < '$currentDate' AND estat != 3";
$conn->query($sql);

// Cerrar la conexión a la base de datos
$conn->close();
?>
