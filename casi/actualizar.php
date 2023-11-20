<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale-1.0">
        <title>Modificar estudiante </title>
        <link rel="stylesheet" href="css/contact.css">

    </head>
    <a href="index.html"><button class="styled-button">Back to Index</button></a>
    <p>
    
        <?php
include("yipi.php");

$ID_Usuario = $_POST["ID_Usuario"];
$Nombre = $_POST["nuevonombre"];
$Apellido = $_POST["nuevoemail"];
$Correo = $_POST["nuevopass"];

$sql = "UPDATE users SET id_user='$ID_Usuario', name='$Nombre', email='$Apellido',
password='$Correo' WHERE id_user='$ID_Usuario'";

    mysqli_query($conexion,$sql) or die("Problemas en el query:" . mysqli_error($conexion));
    echo("Your data is update.");

    mysqli_close($conexion);
    ?>
    </body>
             </html>