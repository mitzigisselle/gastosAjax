<?php
    session_start();
    $usuario = $_POST['usuario'];
    $password = sha1($_POST['password']);

    include "../../clases/Usuarios.php";
    $ObjUsuario = new Usuarios();
    echo $ObjUsuario->loginUsuario($usuario, $password);

?>