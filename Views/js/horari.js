function eliminarHorari(IdHorari) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        document.location.reload();
      }
    };
    xhr.open("POST", "../../Model/Horaris/ModelEliminarHorari.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + IdHorari);

}