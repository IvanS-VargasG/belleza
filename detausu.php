<?php
require 'database.php';
$id=$_GET['id'];

$con = mysqli_connect("localhost", "root", "root","productos");
    $sql="SELECT *
    FROM usuarios
    WHERE id='$id'";
    $res=mysqli_query($con,$sql);
    $dato=mysqli_fetch_assoc($res); 

?>

<html>
<style>
    h1{
        color: #EE7158;
        font-family: verdana;
        font-size: 1.9vw;
        font-weight: bold;
        line-height: 50px;
        height: 50px;
        margin-top: 5%;
        text-align: center;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
    }
    h1:hover{
        color: #eb5133;
    }
    .detusu{
        margin-top: 3%;
        background: #ddd2bb;
        text-align: left;
        border-collapse: collapse;
        border-spacing: 10;
        border-radius: 25px;  
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        width: 50%;
    }
    .padmin{
        color: #eb5133;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        display: inline-table;
        font-family: 'Fira Sans', sans-serif;
    }
    .pnss{
        color: #2fb007;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        display: inline-table;
        font-family: 'Fira Sans', sans-serif;
    }
    .pempleado{
        color: #63b0cd;
        cursor: context-menu;
        font-size: 1vw;
        font-weight: bold;
        display: inline-table;
        font-family: 'Fira Sans', sans-serif;
    }
    th, td{
        color: #2F2F2F;
        cursor: context-menu;
        font-size: 1vw;
        font-family: 'Fira Sans', sans-serif;
        padding: 15px;
        text-align: center;
    }
</style>
<head>
<?php include "partials/nava.php"; ?>
<title>Detalles</title>
<link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
</head>
<body>
    <table class="detusu" align="center">
    <tr><td colspan="3"><?php echo $dato['nombre']." ".$dato['apellidop']." ".$dato['apellidom']; ?></td></tr>
    <tr><td>Usuario <br><?php echo $dato['user']; ?></td><td>Edad <br><?php echo $dato['edad']; ?></td><td>Telefono <br><?php echo $dato['telefono'];  ?></td></tr>
    <tr><td colspan="3">Permiso de <?php if($dato['rol']==0){ ?> <p class="padmin"> <?php echo "Administrador"; ?> </p> <?php }else{ ?> <p class="pempleado"> <?php echo "Empleado"; ?> </p> <?php } ?></td></tr>
    <tr><td colspan="3">Num. de Seguro Social: <p class="pnss"><?php echo $dato['NSS'] ?></p></td></tr>
    <tr><td colspan="3"><a href="listausuarios.php"><h1>Regresar</h1></a></td></tr>
    </table>
</body>
</html>