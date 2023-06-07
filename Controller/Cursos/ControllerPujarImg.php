<?php

include ('../../Model/Cursos/ModelPujarImg.php'); 

$pujarImg = new ModelPujarImg($conn);
if (isset($_GET["id"])) {
    $id_curs = $_GET["id"];
    $pujarImg->pujarImg($id_curs);
}