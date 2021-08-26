<?php 
require "database.php";
if(!empty($_FILES['archivo']['name'])){
	$file_name = $_FILES['archivo']['name'];	//Nombre real del archivo
	$file_tmp  = $_FILES['archivo']['tmp_name'];//Nombre temporal del archivo
	$cadena    = explode(".", $file_name);		//Separa el nombre para obtener la extension
	$ext       = $cadena[1];					//Extension
	$dir       = "IMGprodu/";					//carpeta donde se guardan los archivos
	$file_enc  = md5_file($file_tmp);			//Nombre del archivo encriptado
	$punto=".";

if ($file_name != '') {
	$fileName1  = "$file_enc.$ext";	
	copy($file_tmp, $dir.$fileName1);	
}
$archivo=$file_enc.$punto.$ext;

$con = mysqli_connect("localhost", "root", "root","productos") or die("no se conecto");
        mysqli_select_db($con,$database) or die ("no se conecto db");        
        mysqli_query($con,"UPDATE proveedor SET
		archivo='$archivo'
        WHERE id='$_POST[id]'") or die("no se actualizo la tabla");
}
if(!empty($_POST['marca'])&&!empty($_POST['nombre'])&&!empty($_POST['precio']&&!empty($_POST['stock']))){

	$con = mysqli_connect("localhost", "root", "root","productos") or die("no se conecto");
        mysqli_select_db($con,$database) or die ("no se conecto db");        
        mysqli_query($con,"UPDATE proveedor SET 
        categoria='$_POST[rol]', 
        marca='$_POST[marca]', 
        nombre='$_POST[nombre]',
        precio='$_POST[precio]',
        stock='$_POST[stock]'
        WHERE id='$_POST[id]'") or die("no se actualizo la tabla");
		header('Location: aproductos.php');
		}else{
	header('Location: agreprod.php');
}

?>