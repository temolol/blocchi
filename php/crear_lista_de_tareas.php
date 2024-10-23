<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
</head>
<body>
    <form action="guardar-nombre" method="post" >
        <h2>Lista desordenada:</h2>
        <input type="text" id="inputElemento" placeholder="Agregar lista de tareas">
        <button onclick="agregarlista()">Agregar</button>
    </form>
    
    <ul id="lista">
    </ul>

    <script>
        function agregarlista() {
            var ul = document.getElementById("lista");
            var li = document.createElement("li");
            var input = document.getElementById("inputElemento");
            
            if(input.value !== "") {
                li.textContent = input.value;
                ul.appendChild(li);
                input.value = ""; // Limpiar el campo de texto después de agregar
            } else {
                alert("Por favor, nombre de la lista.");
            }
        }
    </script>

</body>
</html>
