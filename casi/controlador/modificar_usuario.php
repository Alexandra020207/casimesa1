<?php
// Verifica si se ha enviado el formulario (se hizo clic en el botón "btnregistrar")
if (!empty($_POST["btnregistrar"])) {
    // Verifica si todas las variables POST necesarias no están vacías
    if (!empty($_POST["id_user"]) and !empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["password"])) {
        // Obtiene los valores de las variables POST
        $id_user = $_POST["id_user"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Ejecuta una consulta SQL para actualizar los datos del usuario
        $sql = $conexion->query("UPDATE users SET name='$name', email='$email', password='$password' WHERE id_user=$id_user");

        // Verifica si la consulta se ejecutó con éxito
        if ($sql) {
            // Redirige a la página principal después de la modificación
            header("location: index.php");
        } else {
            // Muestra un mensaje de error si la consulta no fue exitosa
            echo "<div class='alert alert-danger'>Error al modificar producto</div>";
        }
    } else {
        // Muestra un mensaje de advertencia si hay campos vacíos en el formulario
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
?>




