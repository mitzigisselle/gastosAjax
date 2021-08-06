<?php

    $datos = array(
        "nombre" => $_POST["nombre"],
        "apellidos" => $_POST["apellidos"],
        "correo" => $_POST["correo"],
        "usuario" => $_POST["usuario"],
        "password" => sha1($_POST["password"])
    );

    include "../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->registrarUsuario($datos);