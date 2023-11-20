<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="validar.php">

            <?php
            include "yipi.php";
            ?>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <a href="index.php">Send</a>
        </form>
        <footer>
            <a href="create.php">Create new account</a>
        </footer>
        <footer>
            <a href="index.html">Go back</a>
        </footer>
    </div>
</body>

</html>
