<!DOCTYPE html>
<?php
    require 'partials/nava.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Lista Usuarios</title>    
</head>
<?php 
		require 'database.php';
		$con = mysqli_connect("localhost", "root", "root","productos");
		$sql= "SELECT * FROM usuarios WHERE eliminado='1' AND id!='21'";
		$res=mysqli_query($con,$sql);
        $fila=mysqli_fetch_assoc($res);
        if($fila != null){
	 ?>
	 <div id="tabla">
	 <table  align="center" class=rounded>
     <!-- Tabla Estatica -->
     <tr><td><p>Nombres</p></td>
     <td><p>Apellido Paterno</p></td>
     <td><p>Apellido Materno</p></td>
     <td><p>Telefono</p></td>
     <td><p>Detalles</p></td>
     <td><p>Editar</p></td>
     <td><p>Eliminar</p></td>
	 	<?php  
	 		do 
	 		{
	 	?>
     <!-- Tabla Dinamica -->
        <tr class="dinamica">
	 		<td><p><?php echo $fila['nombre'] ?></p></td>
	 		<td><p><?php echo $fila['apellidop']  ?></p></td>
      <td><p><?php echo $fila['apellidom'] ?></p></td>
	 		<td><p><?php echo $fila['telefono']  ?></p></td>
       <td><?php echo "<a href=\"detausu.php?id=".$fila['id']."\">"; ?><input type="button" name="deta" value="Detalles"></a></td>
       <td><?php echo "<a href=\"edus.php?id=".$fila['id']."\">"; ?><input type="button" name="edi" value="Editar"></a></td>
	 		<td><?php echo "<a href=\"elmuser.php?id=".$fila['id']."\">"; ?><input type="button" name="eliminar" value="Borrar"></a></td>
	 	</tr>
	 	<?php
	 		}while($fila= mysqli_fetch_assoc($res)); 
	 	 ?>
	 	
	 </table>
	 </div>
     <?php  }else{echo "<center><h1>No hay ningún empleado registrado</h1></center>";} ?>
     
  <style>    
    h1{
      color: #0A0908;
      border-radius: 10px 10px 0 0;
      font-family: verdana;
      font-size: 1.8vw;
      font-weight: bold;
      line-height: 50px;
      height: 50px;
      margin-top: 10%;
      text-align: center;
      text-transform: uppercase;
      vertical-align: middle;
      width: 100%;
    }
    #tabla{
        margin: auto;
        margin-top: 40px;
        width: 80%;
    }
    .rounded{
        background: #0058cc;
        text-align: left;
        border-collapse: collapse;
        border-spacing: 10;
        border-radius: 25px;  
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        width: 50%;
    }
    p{
      color: #f6f3ed;
      font-size: 1vw;
      font-family: 'Fira Sans', sans-serif;
    }
    th, td{
        padding: 15px;
        text-align: center;
    }
    .dinamica{
        background-color: #1F80FF;
    }
    input[type="button"]{
    padding:10px;
    /* font-weight: bold; */
    position: relative;
    vertical-align:"center";
    color: #f6f3ed;
    background: #F68E5F;
    border: none;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
    }
    </style>
  <body>   
  </body>
</html>