<?php
require "database.php";
session_start();
$id = $_SESSION['id'];
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
/////////////////////////////////////////<---------------SELECT de datos especificos de ped_prod---------------->////////////////////////////////////////////////
$sql = "SELECT SUM(cantidad) AS suma FROM ped_prod where id_user=$id";
$res = mysqli_query($con,$sql);
$num = mysqli_fetch_assoc($res);
$prodvend = $num['suma'];
$sql = "SELECT round(SUM(precio*cantidad),2) AS multi FROM ped_prod where id_user=$id";
$res = mysqli_query($con,$sql);
$num = mysqli_fetch_assoc($res);
$totalvent = $num['multi'];
$sql = "SELECT cantidad, id_prod FROM ped_prod where id_user=$id";
$res = mysqli_query($con,$sql);
$num = mysqli_fetch_assoc($res);
 //Nueva variable con la suma de productos vendidos por el usuario en la tabla ped_prod
echo $prodvend;
 //Nueva variable con la multiplicacion de los productos vendidos por el precio de los productos del usuario en la tabla ped_prod
echo $totalvent;
//////////////////////////////////////////////<---------------SELECT de datos ped_prod---------------->/////////////////////////////////////////////////////////
    $sqli = "SELECT * FROM ped_prod where id_user=$id";
    $ress = mysqli_query($con,$sqli);
    $ped = mysqli_fetch_assoc($ress);
//////////////////////////////////////////////<---------------SELECT de datos reporte---------------->/////////////////////////////////////////////////////////
        $sql = "SELECT * FROM reporte where usuario = $id and fecha=$fecha";
        $res = mysqli_query($con,$sql);
        $fila = mysqli_fetch_assoc($res);        
if (!empty($fila)) { //IF que corrobora si ingreso al SELECT de arriba, si no entra significa que es un nuevo usuario realizando la orden por lo que pasa al else
    echo "si entre";
} else {//Ingresa al nuevo usuario al registro de reporte en la base de datos
////////////////////////////////////////////////<---------------INSERT de un nuevo reporte---------------->///////////////////////////////////////////////////////
echo "else".$fecha;
$insertar= "INSERT INTO reporte (usuario, fecha, prodvend, totalvent) VALUES ('$id','$fecha','$prodvend','$totalvent')" ;
$query=mysqli_query($con,$insertar);        
////////////////////////////////////////////<---------------UPDATE del stock de proveedor---------------->///////////////////////////////////////////////////////     
// do {
//     $cantidad= $ped['cantidad'];
//     $idp = $ped['id_prod'];
//     mysqli_query($con,"UPDATE proveedor SET                
//     stock = stock-$cantidad
//     WHERE id=$idp ")or die("no se actualizo la tabla"); 
// } while ($ped= mysqli_fetch_assoc($ress));
////////////////////////////////////////////<---------------DELETE de productos de ped_prod---------------->/////////////////////////////////////////////////////
// $sql = "DELETE FROM ped_prod WHERE id_user=$id";
// $res = mysqli_query($con,$sql);
// header("location: orden.php");
}
?>