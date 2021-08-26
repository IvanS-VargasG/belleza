<?php
$server='localhost';
$username='root';
$password='root';
$database='productos';

try{
    $conn= new PDO("mysql:host=$server; dbname=$database;" ,$username,$password);
}catch(PDOExeption $e){
    die('Conected failed: '.$e->getMessage());
}

$con = mysqli_connect($server,$username,$password,$database)or die("Problemas al Conectar");
mysqli_select_db($con,$database)or die("problemas al conectar con la base de datos");
?>