<?php
// Inclusión del archivo que contiene la lógica de conexión a la base de datos
include "modelo/conexion.php";

// Verifica si $_GET["id"] está definido antes de utilizarlo
$id_user = isset($_GET["id"]) ? $_GET["id"] : null;

// Realiza una consulta para obtener los datos del usuario con el ID proporcionado
$sql = $conexion->query("SELECT * FROM users WHERE id_user = $id_user");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Definición del documento HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Formulario de modificación de usuarios -->
    <form class="col-4 p-3 m-auto" method="POST">
        <!-- Imagen -->
        <img src="imagenes/modificarr.png" class="avatar" alt="Avatar image" height="300">

        <!-- Enlace al archivo de estilos personalizado -->
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Título del formulario -->
        <h3 class="text-center text-secondary">Modify users</h3>

        <!-- Campo oculto que almacena el ID del usuario -->
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

        <?php
        // Inclusión del controlador que maneja la lógica de modificación de usuarios
        include "controlador/modificar_usuario.php";

        // Itera sobre los resultados de la consulta y muestra los datos del usuario
        while ($datos = $sql->fetch_object()) { ?>
            <!-- Campo para modificar el nombre del usuario -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $datos->name; ?>">
            </div>

            <!-- Campo para modificar el correo electrónico del usuario -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $datos->email; ?>">
            </div>

            <!-- Campo para modificar la contraseña del usuario -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="<?php echo $datos->password; ?>">
            </div>
        <?php
        }
        ?>

        <!-- Botón para enviar el formulario de modificación -->
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modify</button>
    </form>
</body>

</html>



