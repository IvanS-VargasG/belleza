<?php 
require "database.php";
if($_POST['rol']!=""){
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
}
if(!empty($_POST['marca'])&&!empty($_POST['nombre'])&&!empty($_POST['precio']&&!empty($_POST['stock']))){
	$rol=$_POST['rol'];
	$marca=$_POST['marca'];
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$stock=$_POST['stock'];

	$insertar="INSERT INTO proveedor (marca,categoria,nombre,precio,stock,archivo) VALUES ('$marca','$rol','$nombre','$precio','$stock','$archivo') ";
	$query=mysqli_query($con,$insertar);
	}
	header('Location: aproductos.php');
	}else{
	header('Location: agreprod.php');
}

?>