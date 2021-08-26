<?php
session_start();
if(empty($_SESSION)){
    header('location: index.php');
}else {
$varid=$_SESSION['id'];
require "database.php";
include "fpdf/fpdf.php";
date_default_timezone_set('America/Mexico_City');
$fechal = date("Y-m-d");
$sqli = "SELECT COUNT(*) FROM reporte where fecha='$fechal'";
    $res = mysqli_query($con,$sqli);
    $num = mysqli_fetch_assoc($res);
$sqli = "SELECT reporte.fecha, reporte.usuario, reporte.totalvent, reporte.prodvend, usuarios.nombre, usuarios.apellidop, usuarios.apellidom, usuarios.user FROM reporte JOIN usuarios where reporte.fecha='$fechal' AND usuarios.id=reporte.usuario";
    $res = mysqli_query($con,$sqli);
    $fila = mysqli_fetch_assoc($res);
if (!empty($fila)) {
$fecha=$fila['fecha'];
$newDate = date("d/m/Y", strtotime($fecha));//fecha ya corregida como D-M-Y

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"PRODUCTOS DE BELLEZA S.A. DE C.V.");
$pdf->SetFont('Arial','B',16);    
$pdf->setY(20);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Reporte del dia: ".$newDate);
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Espacio para agregar algo mas (Si es necesario)");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Usuario", "Nombre","Cant. Prod.","Total");

    // Column widths
    $w = array(53, 87, 20, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    $prodt = 0;
    do {    
        $pdf->Cell($w[0],6,$fila['user'],1);
        $pdf->Cell($w[1],6,$fila['nombre']." ".$fila['apellidop']." ".$fila['apellidom'],1);
        $pdf->Cell($w[2],6,number_format($fila['prodvend']),'1',0,'R');
        $pdf->Cell($w[3],6,"$ ".number_format($fila['totalvent'],2,".",","),'1',0,'R');;

        $pdf->Ln();
        $prodt += $fila['prodvend'];
        $total += $fila['totalvent'];
    }while ($fila= mysqli_fetch_assoc($res));
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 150 + (count($num)*10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
////////////////////////////
$header = array("", "");
$data2 = array(
	array("Productos Vendidos",$prodt),
);
$data3 = array(
	array("Total Vendido", $total),
);
    // Column widths
    $w2 = array(40, 40);
    // Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,number_format($row[1]),'1',0,'R');

        $pdf->Ln();
    }
    foreach($data3 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }
/////////////////////////////
$yposdinamic += (count($data2)*21);
$copy=chr(169);
$pdf->SetFont('Arial','B',12);    

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"Todos los derechos reservados $copy");
$pdf->SetFont('Arial','',10);    ;
$msg = "Reporte del ".$newDate.".pdf";
$pdf->output($msg,'D');
}else {
    header("location: notfound.php");
}
}//Se cierra el else de la variable session
?>