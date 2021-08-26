<?php
session_start();
require 'database.php';
if(!empty($_SESSION['activo'])){
    header('location: index.php');
}else{
    if(!empty($_POST)){
        if(empty($_POST['user']) || empty($_POST['password'])){        
            $message="Ingrese Usuario o contraseña" ;   
        }else{
            $user=$_POST['user'];
            $pass=$_POST['password'];
            $pass=md5($pass);
            $query=mysqli_query($con,"SELECT * FROM usuarios WHERE user='$user' AND pass='$pass' AND eliminado!=0");
            $result=mysqli_num_rows($query);

            if($result > 0){        
                //echo "<script>alert('Bienvenido');</script>";
                $data=mysqli_fetch_array($query);
                $_SESSION['activo'] = true;
                $_SESSION['id'] = $data['id'];
                $_SESSION['user'] = $data['user'];
                $_SESSION['rol'] = $data['rol'];
                if($_SESSION['rol'] == 0){
                    header('Location: usuarios.php');
                }
                if($_SESSION['rol'] == 1){
                    header('Location: aproductos.php');
                }
                
            }else{        
                $message="El correo o contraseña son incorrectos";
                //echo "<script>alert('Hooo Noooo! el correo o contraseña son incorrectos');</script>";
                session_destroy();
            }
        }
    }
}
?>
<html>
    <style>
    .padre{
    position: relative;
    margin-top: 5%;
    display: table;
    width: auto;
    border:1px;
    }
    .hijo{    
        width: 15%;       
        display: table-cell;
    }
    .hijo img{
        position: static;
        width: 90%;
        margin-top: 10%;
        margin-bottom: 15%;
    }
    #inputinicio{
        position: relative;
        outline: none;
        float: left;
        margin-left:5%;
        width: 95%;
        border-radius: 10px;
        border: 1px solid #eee;
    }
    #botoninicio:hover{
    background-color: #006af5;
    }
    #botoninicio{
    padding:15px;
    position: "relative";
    color: #f6f3ed;
    background: #004aad;
    width: 75%;
    margin-top: 3%;
    margin-left: 12%;
    border-radius: 7px;
    cursor: pointer;
    border: none;
    }
    .hijo2{    
        width: auto;    
        display: table-cell;
    }
    </style>
    <head>
        <meta charset="utf-8">
        <title>Ingresar</title>
        <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    </head>
    <body>        
        <br><br>
        <form method="post" action="login.php" enctype="multipart/form-data">
            <h4>Ingresa</h4>
            <center><img class="candado" src="IMG/candado.png" alt="">   </center>
            <div class="padre">
                <div class="hijo"><center><img src="IMG/usuario.png" alt=""></center></div>
                <div class="hijo2"><input id="inputinicio" name="user" type="text" placeholder="Usuario" required></div>            
            </div>
            <div class="padre">
                <div class="hijo"><center><img src="IMG/llave.png" alt=""></center></div>
                <div class="hijo2"><input id="inputinicio" name="password" type="password" placeholder="Contraseña" required></div>            
            </div>    
            <br>
            <input id="botoninicio" type="submit" value="Iniciar Sesión">
    </form>
    </body>
</html>