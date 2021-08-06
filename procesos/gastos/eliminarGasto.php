<?php

    session_start();
    $idGasto = $_POST['idGasto'];
    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Gastos.php";
    $Gasto = new Gastos();
    
    
    echo $Gasto->eliminarGasto($idGasto);
?> 
