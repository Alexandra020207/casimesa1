<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Definición del documento HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISTA ADMIN</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace al archivo de iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/b126400537.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Cuerpo del documento HTML -->
    <h1 class="text-center p-3">ADMIN VIEW</h1>
    <?php
    // Inclusión del archivo que contiene la lógica de conexión a la base de datos
    include "modelo/conexion.php";
    
    // Inclusión del archivo que contiene la lógica para eliminar usuarios
    include "controlador/eliminar_usuario.php";
    ?>
    

    <!-- Contenedor principal utilizando Bootstrap -->
    <div class="container-fluid row">
        <!-- Formulario de registro de usuarios -->
        <form class="col-4 p-3" method="POST">
            <!-- Imagen -->
            <img src="imagenes/imagen_2023-11-17_114818266-removebg-preview.png" class="avatar" alt="Avatar image" height="250">

            <!-- Estilos -->
            <link rel="stylesheet" type="text/css" href="style.css">

            <!-- Título del formulario -->
            <h3 class="text-center text-secondary">User Registration</h3>
            <?php
            // Inclusión de controlador para el registro de usuarios
            include "controlador/registro_persona.php";
            ?>

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="text" class="form-control" name="password">
            </div>

            <!-- Botón de registro -->
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Register</button>
        </form>

        <!-- Tabla que muestra los usuarios registrados -->
        <div class="col-8 p-4">
            <table class="table table-bordered">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID_USER</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PASSWORD</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta a la base de datos para obtener usuarios
                    include("modelo/conexion.php");
                    $sql = $conexion->query("SELECT * FROM users");

                    // Iteración sobre los resultados de la consulta
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <!-- Datos de cada usuario -->
                            <td><?= $datos->id_user ?></td>
                            <td><?= $datos->name ?></td>
                            <td><?= $datos->email ?></td>
                            <td><?= $datos->password ?></td>

                            <!-- Acciones: Modificar y Eliminar -->
                            <td>
                                <a href="modificar.php?id=<?= $datos->id_user ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="index.php?id=<?= $datos->id_user ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Enlace a la biblioteca Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

