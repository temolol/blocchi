<?php
$nombre_serviodor = "localhost";
$nombre_usuario = "root"; 
$contrasena = "";
$nombre_base_de_datos = "blocchi"; 

   
$nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    echo "<h2>Datos Recibidos:</h2>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Apellido: " . htmlspecialchars($apellido) . "<br>";
    echo "Correo: " . htmlspecialchars($correo) . "<br>";
    echo "Contraseña (hash): " . password_hash($contrasena, PASSWORD_DEFAULT) . "<br>";
