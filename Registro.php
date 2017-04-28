
<html>
    <head>
        <meta charset="UTF-8">
        <link href="algo.css" rel="stylesheet" type="text/css"/>
        <title>Nuevo Usuario</title>
    </head>
    <body>
        <div>
            <h1>Registrate!!</h1>
            <form action="" method="POST">
                <p>Nombre de usuario: <input type="text" name="nombre"></p>
                <p>Password: <input type="password" name="pass"></p>
                <p>Confirmación Password: <input type="password" name="pass2"></p>
                <input type="submit" value="Registrarse" name="alta">
            </form>
            <?php
            require_once 'bbdduser.php';
            // Si han pulsado el botón registramos el usuario
            if (isset($_POST["alta"])) {
                // Recogemos el nombre de usuario
                $nusuario = $_POST["nombre"];
                // Comprobamos si ya existe
                if (existeUsuario($nusuario) == true) {
                    echo "<p>Ya existe ese nombre de usuario en la bbdd</p>";
                } else {
                    // Recogemos el resto de datos
                    $pass = $_POST["pass"];
                    $pass2 = $_POST["pass2"];
                    if ($pass == $pass2) {
                        // Registramos el usuario en la bbdd
                        insertUser($nusuario, $pass, $pass2, "usuario");
                    } else {
                        echo "<p>Las contraseñas no coinciden</p>";
                    }
                }
            }
            ?>
            <p><a href="index.php">Inicio</a></p>
        </div>
    </body>
</html>



