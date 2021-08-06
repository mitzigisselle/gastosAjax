<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $sql = "SELECT 
                gastos.id_gasto AS idGasto,
                cat.nombre AS categoria,
                gastos.monto AS monto,
                gastos.descripcion AS descripcion,
                gastos.fecha AS fecha
            FROM
                t_gastos AS gastos
                    INNER JOIN
                t_cat_categorias AS cat ON gastos.id_categoria = cat.id_categoria
                    AND gastos.id_usuario = '$idUsuario'";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-bordered" style="background-color:white" id="datatableGastos">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)) { 
        ?>
        <tr>
            <td><?php echo $mostrar['categoria'];?></td>
            <td><?php echo $mostrar['monto'];?></td>
            <td><?php echo $mostrar['descripcion'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td>
                <button class="btn btn-warning" onclick="obtenerDatosGasto('<?php echo $idGasto ?>')" data-toggle="modal" data-target="#modalActualizarGasto">
                    <span class="fas fa-edit"></span>
                </button>
            </td>
            <td>
            <span class="btn  btn-danger btn-sm" onclick="eliminarGasto('<?php echo  $idGasto = $mostrar['idGasto'];?>')">
                <span class="far fa-trash-alt"></span>
            </span>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#datatableGastos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                
            ]
        });
    });
</script>