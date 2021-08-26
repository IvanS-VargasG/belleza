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
    <title>Usuarios</title>    
</head>
<body>
    <center>
        <div class="tablauser">
                <div class="divimg"><a href="signup.php" ><img width="50%" height="50%" src="IMG/user.png" alt=""></a></div>
                <div class="separaimg"></div>
                <div class="divimg"><a href="listausuarios.php" ><img width="50%" height="50%" src="IMG/usent.png" alt=""></a></div>                
        </div>
        <div class="tablatext">
            <div class="divtexto"><a href="signup.php"><h4>Agregar Usuario</h4></a></div>
            <div class="separatexto"></div>
            <div class="divtexto"><a href="listausuarios.php"><h4>Editar Usuarios</h4></a></div>
        </div>
    </center>
</body>
</html>