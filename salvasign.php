<?php
require 'database.php';
if($_POST['rol']!=""){
    
    if(!empty($_POST['user'])&&!empty($_POST['password'])&&!empty($_POST['nombre'])&&!empty($_POST['apellidop'])&&!empty($_POST['apellidom'])&&!empty($_POST['nss'])&&!empty($_POST['edad'])&&!empty($_POST['tel'])){
        $user=$_POST['user'];
        $nombre=$_POST['nombre'];
        $apellidop=$_POST['apellidop'];
        $apellidom=$_POST['apellidom'];
        $edad=$_POST['edad'];
        $tel=$_POST['tel'];
        $nss=$_POST['nss'];
        $pass=$_POST['password'];
        $pass=md5($pass);
        $rol=$_POST['rol'];
        
        $insertar="INSERT INTO usuarios (user, nombre, apellidop, apellidom, domicilio, edad, telefono, nss, pass, rol) VALUES ('$user', '$nombre', '$apellidop', '$apellidom', '$domi', '$edad', '$tel', '$nss', '$pass', '$rol') ";
        $query=mysqli_query($con,$insertar);
        header('Location: usuarios.php');
    }
}
else{    
	header('Location: signup.php');
}
?>