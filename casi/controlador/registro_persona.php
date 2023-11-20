<?php

// Verifica si el formulario ha sido enviado
if (!empty($_POST["btnregistrar"])) {

    // Verifica si los campos obligatorios no están vacíos
    if (!empty($_POST["nombre"]) and !empty($_POST["email"]) and !empty($_POST["password"])) {

        // Obtén los valores del formulario
        $name = $_POST["nombre"]; // Cambié "name" por "nombre" para que coincida con el formulario HTML
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Ejecuta la consulta SQL para insertar un nuevo usuario en la base de datos
        $sql = $conexion->query("INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')");

        // Verifica si la consulta se ejecutó con éxito
        if ($sql == 1) {
            echo '<div class="alert alert-success">Correctly registered person</div>'; // Usuario registrado correctamente
        } else {
            echo '<div class="alert alert-danger">Unregistered person</div>'; // Error al registrar el usuario
        }
    } else {
        echo '<div class="alert alert-warning">Empty field</div>'; // Campo vacío
    }
}

?>
