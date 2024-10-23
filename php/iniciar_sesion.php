<?php
include_once "conexion.php";
//aqui optengo los datos con el method post desde el html iniciar sesion
$correo = $_POST['correo'];
$contraseña = $_POST['contrasena'];

//preparo la consulta
$stmt = $conn->prepare("SELECT contraseña FROM usuario WHERE email = ?"); //preparto el query para hacer la consulta en my sql
$stmt->bind_param("s", $correo);//preparto el query para hacer la consulta en my sql
$stmt->execute();//executa el query
$resultado = $stmt->get_result();//obtinene el resultado del query en forma de una array
$fila = $resultado->fetch_assoc();//obitiene el valor contenido dentro del array

if ($fila) {
    // Si existe el correo, verificar la contraseña
    if (password_verify($contraseña, $fila['contraseña'])) {
        $showModal = true;
        $modalMessage = "¡Inicio de sesión exitoso!";
    } else {
        $showModal = true;
        $modalMessage = "Contraseña incorrecta.";
    }
} else {
    // Si no existe el correo
    $showModal = true;
    $modalMessage = "El correo electrónico no está registrado.";
}
?>

<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Mensaje del servidor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $modalMessage; ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if ($showModal): ?>
        var myModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        myModal.show();
    <?php endif; ?>
</script>
