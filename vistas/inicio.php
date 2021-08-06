
<?php include "header.php"; ?>

<?php 
    if (isset($_SESSION['usuario'])) { 
        include "menu.php";
?>
    

    <!-- Seccion de contenido -->

        
    <!-- Termina Seccion de contenido -->

<?php include "footer.php"; ?>
<?php 
    } else {
        header("location:../index.html");
    } 
?>