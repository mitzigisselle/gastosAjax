$(document).ready(function(){

	$('#btnActualizarGasto').click(function(){
		actualizarGasto();
	});
});





function agregarNuevoGasto(){
    $.ajax({
        type:"POST",
        data:$('#frmAgregarGasto').serialize(),
        url:"../procesos/gastos/agregarNuevoGasto.php",
        success:function(resultado) {
            resultado = resultado.trim();

            if (resultado == 1) {
                $('#frmAgregarGasto')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(","Error al agregar" + resultado,"error");
            }
        }
    });

    return false;
}

function actualizarGasto() {
	$.ajax({
		type: "POST",
		url: "../procesos/gastos/actualizarGasto.php",
		data: $('#frmAgregarGastoU').serialize(),
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				swal.fire(":D", "se actualizo con exito", "success")
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(", "No se pudo actualizar" + resultados, "error");
            }
		}
	});
}


function obtenerDatosGastos(idGasto) {
    $.ajax({
        type: "POST",
        data: "idGasto=" + idGasto,
        url: "../procesos/gastos/obtenerDatosGasto.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            respuesta = jQuery.parseJSON(respuesta);
            idCategoria = respuesta['id_categoria'];
            $('#montoU').val(respuesta['monto']);
            $('#descripcionU').val(respuesta['descripcion']);
            $('#fechaU').val(respuesta['fecha']);
            $('#idGastoU').val(respuesta['id_gasto']);
            $('#categoriasIdU').load("gastos/selectGastoUpdate.php?idCategoria=" + idCategoria);

        }
    });
}



function eliminarGasto(idGasto) {
    $.ajax({
        type: "POST",
        data: "idGasto=" + idGasto,
        url: "../procesos/gastos/eliminarGasto.php",
        success: function(resultados) {
            resultados = resultados.trim();
            if (resultados == 1) {

                $('#frmAgregarGasto')[0].reset();
                swal.fire(":D", "Eliminado con exito", "success")
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(", "No se pudo agregar" + resultados, "error");
            }
        }
    });
    return false;
};