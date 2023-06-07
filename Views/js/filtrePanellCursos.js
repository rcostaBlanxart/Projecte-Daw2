function filtrarCurs(estatCurs) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        document.getElementById("divCursos").innerHTML=xhr.responseText;
      }
    };
    xhr.open("POST", "../../Controller/Cursos/ControllerPanellCursos.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("estatCurs=" + estatCurs);
}