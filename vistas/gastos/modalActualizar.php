
<div class="modal fade" id="modalActualizarGasto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form id="frmAgregarGastoU">
                <div id="categoriasIdU"></div>
                <input type="text" id="idGastoU" name="idGastoU" hidden="">
                <label for="montoU">Monto</label>
                <input type="number" name="montoU" id="montoU" class="form-control" required>
                <label for="descripcionU">Descripcion</label>
                <input type="text"name="descripcionU" id="descripcionU" class="form-control" required>
                <label for="fechaU">Fecha</label>
                <input type="date" name="fechaU" id="fechaU" class="form-control" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnActualizarGasto">Actualizar</button>
            </div>
        </div>
    </div> 
</div>