<?php

function existeUsuario($nombre_usuario) {
    $conexion = conectar("msg");
    $consulta = "select * from user where username='$nombre_usuario';";
    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $consulta);
    // Contamos cuantas filas tiene el resultado
    $contador = mysqli_num_rows($resultado);
    desconectar($conexion);
    // Si devuelve 1 es que ya existe un usuario con ese nombre de usuario
    // Si devuelve 0 no existe
    if ($contador == 0) {
        return false;
    } else {
        return true;
    }
}

function insertUser($nusuario, $pass, $usuario, $surname) {
    $conexion = conectar("msg");
    $insert = "insert into user values "
            . "('$nusuario', '$pass', '$usuario', '$surname','1')";
    if (mysqli_query($conexion, $insert)) {
        echo "<p>Usuario dado de alta</p>";
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}
