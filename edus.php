<?php
    require 'database.php'; 
?>

<html>
<style>

/* input[type="submit"]:hover{
    background-color: #00b8eb;
} */
</style>
    <head>
    <?php         
        include "partials/nava.php"; ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    </head>
    
    <?php
        $id = $_REQUEST['id'];
        require 'database.php';
		$con = mysqli_connect("localhost", "root", "root","productos");
		$sql= "SELECT * FROM usuarios WHERE id ='$id'";
		$res=mysqli_query($con,$sql);
        $fila=mysqli_fetch_assoc($res);
    ?>
    <body>  
            <br><br>
                <form method="post" action="salvaedus.php" enctype="multipart/form-data">   
                    <h4>Editar Usuario</h4><center><a href="listausuarios.php"><h2 class="regreso">Regresar</h2></a></center>
                    <center>
                        <select name="rol">
                            <?php if($fila['rol']==0){ ?>
                                <option value="0">Administrador</option>
                                <option value="1">Empleado</option>
                             <?php }else{ ?>
                                <option value="1">Empleado</option>
                                <option value="0">Administrador</option>
                            <?php } ?>
                        </select>
                            <input name="id" type="hidden" value="<?php  echo $fila['id']; ?>">
                            <input name="user" type="text" value="<?php echo $fila['user']; ?>" placeholder="Usuario" required>
                            <input name="nombre" type="text" value="<?php echo $fila['nombre']; ?>" placeholder="Nombre" required>
                            <input name="apellidop" type="text" value="<?php echo $fila['apellidop']; ?>" placeholder="Apellido Paterno" required>
                            <input name="apellidom" type="text" value="<?php echo $fila['apellidom']; ?>" placeholder="Apellido Materno" required>
                            <input name="edad" type="text" value="<?php echo $fila['edad']; ?>" placeholder="Edad (Numero)" required>
                            <input name="tel" type="text" value="<?php echo $fila['telefono']; ?>" placeholder="Telefono" required>
                            <input name="nss" type="text" value="<?php echo $fila['NSS']; ?>" placeholder="Numero de Seguro Social" required>
                            <input name="password" type="password" placeholder="password" placeholder="Contraseña" required><br><br>
                            <input type="submit" value="Actualizar Usuario">
                    </center>
                </form>
    </body>
    
</html>