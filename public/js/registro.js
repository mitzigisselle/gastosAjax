function registraUsuario() {
    $.ajax({
        type:"POST",
        data:$('#frmRegistro').serialize(),
        url:"procesos/registro/registrar.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                Swal.fire(':D','Agregado con exito!','success');
                $('#frmRegistro')[0].reset();
            } else if (respuesta == 2) {
                Swal.fire(':O','Este usuario ya existe escriba otro por favor!','info');
            } else {
                Swal.fire(':(','Fallo al agregar!','error');
                console.log(respuesta);
            }
        }
    });

    return false;
}