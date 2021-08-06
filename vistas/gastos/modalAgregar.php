<?php
    $sql = "SELECT id_categoria, nombre FROM t_cat_categorias ORDER BY nombre";
    $respuesta = mysqli_query($conexion, $sql);
?>
<form id="frmAgregarGasto" method="POST" onsubmit="return agregarNuevoGasto()">
    <div class="modal fade" id="modalAgregarGasto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gasto nuevo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="idCategoria">Categoria</label>
                    <select name="idCategoria" id="idCategoria" class="form-control" required>
                        <option value=""></option>
                    <?php while($mostrar = mysqli_fetch_array($respuesta)): ?>
                        <option value="<?php echo $mostrar['id_categoria'] ?>"><?php echo $mostrar['nombre'] ?></option>
                    <?php endwhile; ?>
                    </select>
                    <label for="monto">Monto</label>
                    <input type="number" name="monto" id="monto" class="form-control" required>
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>