<?php
// Verifica si la variable GET "id" no está vacía
if (!empty($_GET["id"])) {
    // Obtiene el valor de "id" de la variable GET
    $id = $_GET["id"];

    // Ejecuta una consulta SQL para eliminar el usuario con el ID proporcionado
    $sql = $conexion->query("DELETE FROM users WHERE id_user = $id");

    // Verifica si la consulta se ejecutó con éxito (afectó una fila)
    if ($sql == 1) {
        // Muestra un mensaje de éxito si el usuario se eliminó correctamente
        echo '<div class="alert alert-success">Usuario eliminado correctamente</div>';
    } else {
        // Muestra un mensaje de error si hubo un problema al eliminar el usuario
        echo '<div class="alert alert-danger">Error al eliminar usuario</div>';
    }
}
?>




