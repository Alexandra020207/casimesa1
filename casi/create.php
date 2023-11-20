<!DOCTYPE html>   
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Create</title>
</head>

<body>
    <div class="container">
        <h1>Create a new account</h1>
        <form action="ases.php" method="post" enctype="multipart/form-data">
            <?php
            include "yipi.php";
            ?>
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Your name" required>
            </div>

            <div>
                <label for="email">E-Mail:</label>
                <input type="email" name="email" placeholder="email@gmail.com" required>
            </div>

            <div>
                <label for="pass">Create a password:</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button class="btn btn-primary" type="submit">Subir</button>
        </form>

        <footer>
            <a href="login.php">Go back to login</a>
        </footer>
    </div>
</body>

</html>
