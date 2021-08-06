<?php
    session_start();
    
    $datos = array(
        "idGasto" => $_POST['idGastoU'],
        "idCategoria" => $_POST['idCategoriaSelectU'],
        "monto" => $_POST['montoU'],
        "descripcion" => $_POST['descripcionU'],
        "fecha" => $_POST['fechaU']
    );

    include "../../clases/Gastos.php";
    $Gastos = new Gastos();
    echo $Gastos->actulizarGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha);
?>