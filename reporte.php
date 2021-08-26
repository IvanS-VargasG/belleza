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
    <title>Reporte</title>    
</head>
<style>
.tablareporte{
    position: relative;
    margin-top: 10%;
    display: table;
    width: 20%;
    border:1px;
}
.imgreporte{
    margin-top:5%;
}
</style>
<body>
    <center>
        <div class="tablareporte">
                <div class="divimg"><a href="reportepdf.php" ><img class="imgreporte" width="50%" height="50%" src="IMG/reporte.png" alt=""></a></div>                
        </div>
        <div class="tablatext">
            <div class="divtexto"><a href="reportepdf.php"><h4>Generar Reporte</h4></a></div>
        </div>
    </center>
</body>
</html>