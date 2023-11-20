<?php
// Iniciar sesion
session_start();


if (!isset($_SESSION['id_user'])) {
    // Redirige al login
    header('Location: user.php');
    exit();
}

$user_id = $_SESSION['id_user'];


$query = "SELECT * FROM usuarios WHERE id_user = :id_user";
$stmt = $db->prepare($query);
$stmt->bindParam(':id_user', $id_user);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si el usuario está intentando editar su propia información
    if ($user_id == $_POST['id_user']) {
        //Campos para actualizar

        $new_name = $_POST['new_name'];
        $new_email = $_POST['new_email'];
        $new_password = $_POST['new_password'];
        $query = "UPDATE users SET name = :new_name WHERE id_user = :id_user";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':new_name', $new_name);
        $stmt->bindParam(':new_email', $new_email);
        $stmt->bindParam(':new_password', $new_password);
        $stmt->execute();


        header('Location: index.php');
        exit();
    } else {
        // El usuario está intentando editar la información de otro usuario
        echo "No tienes permisos para editar la información";
    }
}

//información actual del usuario
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar Perfil</title>
</head>

<body>
    <h1>Editar Perfil</h1>
    <form method="POST" action="edit.php">
        <label for="new_name">New name:</label>
        <input type="text" id="new_name" name="new_name" value="<?php echo $user['name']; ?>">

        <label for="new_name">New email:</label>
        <input type="text" id="new_email" name="new_email" value="<?php echo $user['email']; ?>">

        <label for="new_name">New Password:</label>
        <input type="text" id="new_password" name="new_password" value="<?php echo $user['password']; ?>">

        <input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
        <button type="submit">Save</button>
    </form>
</body>

</html>