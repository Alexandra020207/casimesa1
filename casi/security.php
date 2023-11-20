<?php
//Seguridad del index jajajajja lo logre >:D
session_start();

// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Obtener el ID del usuario actual
$user_id = $_SESSION['user_id'];

// Consultar la base de datos para obtener los datos del usuario actual
$query = "SELECT  name, password FROM users WHERE name = ?";
$stmt = mysqli_prepare($conexion, $query);

if ($stmt) 
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute
?>
    