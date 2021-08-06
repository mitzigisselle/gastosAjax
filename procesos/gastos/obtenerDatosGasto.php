<?php 

	session_start();

    include "../../clases/Gastos.php";

	$idUsuario = $_SESSION['usuario']['id'];
	
	$Gastos = new Gastos();
	$idGasto = $_POST['idGasto'];

	echo json_encode($Contactos->obtenerDatosGasto($idGasto));
	
?> 