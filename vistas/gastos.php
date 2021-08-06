
<?php
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    include "header.php"; 
?>

<?php 
    if (isset($_SESSION['usuario'])) { 
        include "menu.php";
?>
    

    <!-- Seccion de contenido -->

    <div class="jumbotron">
        <h1 class="display-4">Agregar gastos</h1>
        <p class="lead"> 
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGasto">
                        <span class="far fa-plus-square"></span> Agregar gasto
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div id="tablaGastosLoad"></div>
                </div>
            </div>
        </p>
    </div>

    <?php include '../vistas/gastos/modalAgregar.php'?>
    <?php include '../vistas/gastos/modalActualizar.php'?>
    
    <!-- Termina Seccion de contenido -->
<?php include "footer.php"; ?>
<script src="../public/js/gastos.js"></script>

    <script>
        $(document).ready(function(){
            $('#tablaGastosLoad').load("gastos/tablaGastos.php");
        });
    </script>

<?php 
    } else {
        header("location:../index.html");
    } 
?>