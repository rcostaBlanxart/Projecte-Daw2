<?php 
  // Verificar si se han enviado los datos del formulario
    // Verificar si los campos requeridos tienen datos
    $IdHorari = $_POST["id_horari"];
        if(!empty($_POST["id_horari"] && $_POST['id_dia']) && !empty($_POST['id_franja'])) {
          // Procesar los datos del formulario
          include ('../../Model/Horaris/ModelEditarHorari.php');
            $nouCurs=new ModelEditarHorari($conn);
            $IdDiaSetmana = $_POST["id_dia"];
            $IdFranja = $_POST["id_franja"];
    
            $updateHorari=$nouCurs->editarHorari($IdDiaSetmana,$IdFranja,$IdHorari);
            header("Location: ../../Views/html/panell_horari.php");
            session_start();
            $_SESSION["ErrorEditarHorari"]=0;
        } else {
            // Redirigir al usuario a la página del formulario para que complete los campos requeridos
            header("Location: ../../Views/html/editarHorari.php?id=".$IdHorari."");
            session_start();
            $_SESSION["ErrorEditarHorari"]=1;
        }
?>