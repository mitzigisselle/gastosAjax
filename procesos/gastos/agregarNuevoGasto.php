
<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    $idCategoria = $_POST['idCategoria'];
    $monto = $_POST['monto'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    include "../../clases/Gastos.php";
    $Gastos = new Gastos();
    echo $Gastos->agregarNuevoGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha);
?>