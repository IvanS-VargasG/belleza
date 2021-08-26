<!DOCTYPE html>
<html lang="es">
<?php 
include "partials/nava.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Menu Productos</title>    
</head>
<style>
    .imgedit{
        margin-top: 7%;
    }
</style>
<body>
    <center>
    <?php if ($rol==0) { ?> 
        <div class="tablauser">               
                <div class="divimg"><a href="agreprod.php" ><img class="imgedit" width="50%" height="50%" src="IMG/regialma.png" alt=""></a></div>
                <div class="separaimg"></div>
                <div class="divimg"><a href="listaproduc.php" ><img class="imgedit" width="40%" height="40%" src="IMG/editaprodu.png" alt=""></a></div>  
                <div class="separaimg"></div>
                <div class="divimg"><a href="listprod.php" ><img class="imgedit" width="45%" height="45%" src="IMG/carrito.png" alt=""></a></div>                
        </div>
        <div class="tablatext">
            <div class="divtexto"><a href="signup.php"><h4>Agregar Producto</h4></a></div>
            <div class="separatexto"></div>
            <div class="divtexto"><a href="listausuarios.php"><h4>Editar Productos</h4></a></div>
            <div class="separatexto"></div>
            <div class="divtexto"><a href="listprod.php"><h4>Vender Productos</h4></a></div>
        </div>
        <?php }else { ?>
            <div class="tablauser">                               
                <div class="divimg"><a href="listprod.php" ><img class="imgedit" width="45%" height="45%" src="IMG/carrito.png" alt=""></a></div>                
        </div>
        <div class="tablatext">
            <div class="divtexto"><a href="listprod.php"><h4>Vender Productos</h4></a></div>
        </div>
        <?php } ?>
    </center>
</body>
</html>