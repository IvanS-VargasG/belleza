<?php
session_start();
require "database.php";
include "fpdf/fpdf.php";
$id = $_REQUEST['id'];
date_default_timezone_set('America/Mexico_City');
$fecha = date("d-m-Y");
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT nombre FROM usuarios WHERE id=$id ";
$res = mysqli_query($con,$sql);
$fila = mysqli_fetch_assoc($res);
$nombre=$fila['nombre'];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT proveedor.nombre, ped_prod.precio, ped_prod.cantidad FROM proveedor JOIN ped_prod WHERE  proveedor.id=ped_prod.id_prod AND ped_prod.id_user=$id ";
$res = mysqli_query($con,$sql);
$num = mysqli_fetch_assoc($res);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!empty($num)) {    
$pdf = new FPDF('P','mm',array(80,150));
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(15);
$pdf->Cell(5,$textypos,"Productos de Belleza");
$pdf->SetFont('Arial','',6);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setX(3);
$pdf->Cell(5,$textypos,'-----------------------------------------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(3);
$pdf->Cell(5,$textypos,'CANT.    ARTICULO                                PRECIO                  TOTAL');

$total =0;
$off = $textypos;
$SY = 15;
do {
    $texto = $num["nombre"];
    $nuevot = wordwrap($texto, 20, "\n", false);
    $pdf->setY($SY);
    $pdf->setX(4);
    $pdf->Cell(11,1,number_format($num["cantidad"]),0,"R");
    // $SY+=3;
    $pdf->setY($SY-1);
    $pdf->setX(12);
    // $pdf->MultiCell(48,3, $num["nombre"], 0,'L' );
    $pdf->MultiCell(0,3, strtoupper($nuevot),0,'J',0,1);
    $SY+=3;
    $pdf->setX(42);
    // $pdf->setY($SY);
    $pdf->Cell(11,-4,  "$".number_format($num["precio"],2,".",",") ,0,"R");
    // $SY+=3;
    $pdf->setX(60);
    // $pdf->setY($SY);
    $pdf->Cell(11,-4,  "$ ".number_format($num["cantidad"]*$num["precio"],2,".",",") ,0,"R");
    
    $total += $num["cantidad"]*$num["precio"];    
    $SY+=3;
} while ($num= mysqli_fetch_assoc($res));

$textypos=$off;

$pdf->SetFont('Arial','',8);
$pdf->setX(10);
$pdf->cell(5,$textypos,"FECHA: ".$fecha);
$pdf->setX(45);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(66);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(19);
$pdf->Cell(5,$textypos+16,'GRACIAS POR TU COMPRA '); 
$pdf->setX(20);
$pdf->Cell(5,$textypos+32,'Lo atendio '.strtoupper($nombre)); 

$pdf->output('ticket.pdf','D');

$sql = "DELETE FROM ped_prod WHERE id_user=$id"; 
$res = mysqli_query($con,$sql);

}else{
    echo "PDF ERROR";
}  
?>