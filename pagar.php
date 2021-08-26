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
//////////////////////////////////////////////<---------------SELECT de datos ped_prod---------------->/////////////////////////////////////////////////////////
    $sqli = "SELECT * FROM ped_prod where id_user=$id";
    $ress = mysqli_query($con,$sqli);
    $ped = mysqli_fetch_assoc($ress);
//////////////////////////////////////////////<---------------SELECT de datos reporte---------------->/////////////////////////////////////////////////////////
        $sql = "SELECT * FROM reporte where usuario = $id and fecha='$fecha' ";
        $res = mysqli_query($con,$sql);
        $fila = mysqli_fetch_assoc($res);
if (!empty($fila)) { //IF que corrobora si ingreso al SELECT de arriba, si no entra significa que es un nuevo usuario realizando la orden por lo que pasa al else
    if ($fila['fecha']==$fecha) {  //IF que corrobora si la fecha actual del dispositivo concuerda con la fecha guardada en la base de datos
        $aux = $fila['totalvent']; //Nueva variable con los datos del total de ventas vendidas en la tabla reporte
        $auxx = $fila['prodvend']; //Nueva variable con los datos del total productos vendidos en la tabla reporte
        $totalvent += $aux; //Suma del total de ventas de la tabla ped_prod con los valores de la tabla reporte
        $prodvend += $auxx; //Suma del total de productos de la tabla ped_prod con los valores de la tabla reporte
//////////////////////////////////////////////////////<---------------UPDATE de reporte---------------->//////////////////////////////////////////////////////////
        mysqli_select_db($con,$database) or die ("no se conecto db");        
        mysqli_query($con,"UPDATE reporte SET 
        prodvend='$prodvend',        
        totalvent='$totalvent'
        WHERE usuario=$id AND fecha='$fecha'")or die("no se actualizo la tabla");
////////////////////////////////////////////<---------------UPDATE del stock de proveedor---------------->///////////////////////////////////////////////////////
        do {            
        $cantidad = $ped['cantidad'];
        $idp = $ped['id_prod'];
        mysqli_query($con,"UPDATE proveedor SET                
        stock = stock-$cantidad
        WHERE id=$idp ")or die("no se actualizo la tabla proveedor"); 
    } while ($ped= mysqli_fetch_assoc($ress));
////////////////////////////////////////////<---------------DELETE de productos de ped_prod---------------->/////////////////////////////////////////////////////    
    header("location: orden.php");
    } else {
//////////////////////////////////////////<-----------INSERT de un nuevo reporte si la fecha no coinside------------>////////////////////////////////////////////
        $insertar= "INSERT INTO reporte (usuario, fecha, prodvend, totalvent) VALUES ('$id','$fecha','$prodvend','$totalvent')" ;
        $query=mysqli_query($con,$insertar);        
////////////////////////////////////////////<---------------UPDATE del stock de proveedor---------------->///////////////////////////////////////////////////////
        do {
            $cantidad= $ped['cantidad'];
            $idp = $ped['id_prod'];
            mysqli_query($con,"UPDATE proveedor SET                
            stock = stock-$cantidad
            WHERE id=$idp ")or die("no se actualizo la tabla proveedor"); 
        } while ($ped= mysqli_fetch_assoc($ress));
////////////////////////////////////////////<---------------DELETE de productos de ped_prod---------------->/////////////////////////////////////////////////////        
        header("location: orden.php");
    }    
} else {//Ingresa al nuevo usuario al registro de reporte en la base de datos
////////////////////////////////////////////////<---------------INSERT de un nuevo reporte---------------->///////////////////////////////////////////////////////
        $insertar= "INSERT INTO reporte (usuario, fecha, prodvend, totalvent) VALUES ('$id','$fecha','$prodvend','$totalvent')" ;
        $query=mysqli_query($con,$insertar);        
////////////////////////////////////////////<---------------UPDATE del stock de proveedor---------------->///////////////////////////////////////////////////////     
        do {
            $cantidad= $ped['cantidad'];
            $idp = $ped['id_prod'];
            mysqli_query($con,"UPDATE proveedor SET                
            stock = stock-$cantidad
            WHERE id=$idp ")or die("no se actualizo la tabla"); 
        } while ($ped= mysqli_fetch_assoc($ress));
////////////////////////////////////////////<---------------DELETE de productos de ped_prod---------------->/////////////////////////////////////////////////////        
        header("location: orden.php");
}
?>