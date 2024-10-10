<?php
include_once "conexion.php";
?>
<html>
    <p></p>
</html>
<?php

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT EXISTS(SELECT 1 FROM usuario WHERE email = '$correo')";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_row();
if ($fila[0] == 1) {
    //ejeutar comprovacion de contraseña
} else {
    //mandar mensaje para que sepa que no existe el usuario esta incorrecta y redirigir de nuevo iniciar sesion
}