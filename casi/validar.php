<?php
if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['name'] = $name;

    $conexion = mysqli_connect("localhost", "root", "", "si");

    // Utilizar una consulta preparada para evitar inyecciones SQL
    $consulta = "SELECT id_user FROM users WHERE name=? AND password=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id_user);

    if (mysqli_stmt_fetch($stmt)) {
        if ($id_user == 1) { // Admin
            header("location: indexa.php");
        } elseif ($id_user >1) { // User
            header("location: index.php");
        } else {
            include("login.php");
            ?>
            <h1>error</h1>
            <?php
        }
    } else {
        include("login.php");
        ?>
        <h1>error</h1>
        <?php
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    // Manejar el caso en el que name o password no estén presentes en $_POST
    echo "Error: Campos 'name' o 'password' no presentes en la solicitud POST.";
}
?>