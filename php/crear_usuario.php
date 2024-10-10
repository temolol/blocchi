<?php
include_once "conexion.php";
?>
<html>
    <p></p>
</html>
<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$apellido = $_POST['apellido'];

// Consulta SQL
$sql = "SELECT EXISTS(SELECT 1 FROM usuario WHERE email = '$correo')";
// Ejecutar la consulta
$resultado = $conn->query($sql);
// Obtener el valor del resultado
$fila = $resultado->fetch_row();
// Verificar si existe el correo
if ($fila[0] == 1) {
    echo "El correo ya existe en la base de datos.";
} else {
    $stmt = $conn->prepare("CALL insertar_usuario(?, ?, ?, ?)");

    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $contrasena,);
    
    if ($stmt->execute()) {
        echo "Usuario guardado correctamente.";
    } else {
        echo "Error al insertar usuario: " . $stmt->error;
    }
    
    $stmt->close();
    
    $conn->close();;
}

