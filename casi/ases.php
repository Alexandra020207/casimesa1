<?php
// Create 
include("yipi.php");

$se = $_POST["name"];
$sus = $_POST["email"];
$ay = $_POST["password"];

$query_users = "INSERT INTO users VALUES (NULL, '$se', '$sus', '$ay')";

if (mysqli_query($conexion, $query_users)) {
    echo "Se creo el usuario";
} else {
    echo "Error al insertar el usuario: " . mysqli_error($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Create</title>
    <a href="index.php">Go the principal page</a>
    <link rel="stylesheet" href="css/contact.css">
</head>
</html>