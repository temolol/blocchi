<?php
include_once "conexion.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$apellido = $_POST['apellido'];

$stmt = $conn->prepare("CALL insertar_usuario(?, ?, ?, ?)");

$stmt->bind_param("ssss", $nombre, $apellido, $email, $contrasena,);

if ($stmt->execute()) {
    echo "Usuario insertado correctamente.";
} else {
    echo "Error al insertar usuario: " . $stmt->error;
}

$stmt->close();

$conn->close();