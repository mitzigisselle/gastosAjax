function loginDeUsuario() {
    $.ajax({
        type:"POST",
        data:$('#frmLogin').serialize(),
        url:"procesos/login/loginUsuario.php",
        success:function(resultado) {
            resultado = resultado.trim();
            if (resultado == 1) {
                window.location.href = "vistas/inicio.php";
            } else {
                Swal.fire(":(","No se ha encontrado el usuario!","info");
                console.log(resultado);
            }
        }
    });
    return false;
}
