<?php
require 'database.php';
if($_POST['rol']!=""){
    
    if(!empty($_POST['user'])&&!empty($_POST['password'])&&!empty($_POST['nombre'])&&!empty($_POST['apellidop'])&&!empty($_POST['apellidom'])&&!empty($_POST['nss'])&&!empty($_POST['edad'])&&!empty($_POST['tel'])){
        $con = mysqli_connect("localhost", "root", "root","productos") or die("no se conecto");
        mysqli_select_db($con,$database) or die ("no se conecto db");        
        $pass=$_POST['password'];
        $pass=md5($pass);
        mysqli_query($con,"UPDATE usuarios SET user='$_POST[user]', 
        nombre='$_POST[nombre]', 
        apellidop='$_POST[apellidop]', 
        apellidom='$_POST[apellidom]',
        edad='$_POST[edad]',
        telefono='$_POST[tel]',
        NSS='$_POST[nss]',
        pass='$pass',
        rol='$_POST[rol]' WHERE id='$_POST[id]'") or die("no se actualizo la tabla");
        header('Location: usuarios.php');
    }
}
else{    
	header('Location: signup.php');
}
?>