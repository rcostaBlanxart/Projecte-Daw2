function mostrar_dades(id_reserva) {
    // var id_reserva =  document.getElementById(id_reserva);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            document.getElementById("contingut_"+id_reserva).innerHTML = xhr.responseText;
            // alert(xhr.responseText);
        }
    }
    xhr.open("POST", "../../Controller/Reserva/ControllerReservasTotals.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("id_reserva=" + id_reserva);
}