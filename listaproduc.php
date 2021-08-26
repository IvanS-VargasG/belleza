<!DOCTYPE html>
<?php
    require 'partials/nava.php';  
    require 'database.php';  
    if(!empty($_POST)){
        if ($_POST['order']==null) {
            $con = mysqli_connect("localhost", "root", "root","productos");    
            $sql= "SELECT * FROM proveedor WHERE elim='0' ORDER BY nombre ";
            $res=mysqli_query($con,$sql);
            $fila=mysqli_fetch_assoc($res);   
        }else{
            $orden=$_POST['order'];        
            $con = mysqli_connect("localhost", "root", "root","productos");
            $sql= "SELECT * FROM proveedor WHERE categoria='$orden' AND elim='0' ORDER BY nombre ";
            $res=mysqli_query($con,$sql);
            $fila=mysqli_fetch_assoc($res);
        }
    }else{      
    $con = mysqli_connect("localhost", "root", "root","productos");    
    $sql= "SELECT * FROM proveedor WHERE elim='0' ORDER BY nombre ";
    $res=mysqli_query($con,$sql);
    $fila=mysqli_fetch_assoc($res);    		
    }
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

	 <div id="tabla">
     <form class="cate" method="POST" action="listaproduc.php">
     <select class="sel" name="order">
        <option value="">Todas las Categorias</option>
        <option value="0">Maquillaje</option>
        <option value="1">Cuidado de la piel</option>
        <option value="2">Aseo personal</option>
        <option value="3">Tintes de cabello</option>
        <option value="4">Barberia</option>
    </select>
    <input type="submit" value="Buscar">
     </form>
     <?php      
        if($fila != null){
	 ?>
	 <table  align="center" class=rounded>
     <!-- Tabla Estatica -->
     <tr><td><p>Categoria</p></td>
     <td><p>Marca</p></td>
     <td><p>Nombre</p></td>
     <td><p>Precio</p></td>
     <td><p>Stock</p></td>
     <td><p>Detalles</p></td>
     <td><p>Editar</p></td>
     <td><p>Eliminar</p></td>
	 	<?php  
	 		do 
	 		{
	 	?>
     <!-- Tabla Dinamica -->
        <tr class="dinamica">
            <td><p><?php if($fila['categoria']==0){ echo "Maquillaje";}
            if($fila['categoria']==1){ echo "Cuidado de  la piel";}
            if($fila['categoria']==2){ echo "Aseo Personal";}
            if($fila['categoria']==3){ echo "Tientes de Cabello";}
            if($fila['categoria']==4){ echo "Barberia";}?>
            </p></td>
	 		<td><p><?php echo $fila['marca'] ?></p></td>
	 		<td><p><?php echo $fila['nombre']  ?></p></td>
            <td><p><?php echo "$".$fila['precio'] ?></p></td>
	 		<td><p><?php 
             if($fila['stock']<10){ ?>
             <p class="stock"><?php echo $fila['stock'];?></p>
             <?php }else{ echo $fila['stock'];}?></p></td>
       <td><?php echo "<a href=\"detaprodu.php?id=".$fila['id']."\">"; ?><input type="button" name="deta" value="Detalles"></a></td>
       <td><?php echo "<a href=\"edprod.php?id=".$fila['id']."\">"; ?><input type="button" name="edi" value="Editar"></a></td>
	 		<td><?php echo "<a href=\"elmprod.php?id=".$fila['id']."\">"; ?><input type="button" name="eliminar" value="Borrar"></a></td>
	 	</tr>
	 	<?php
	 		}while($fila= mysqli_fetch_assoc($res)); 
	 	 ?>
	 	
	 </table>
	 </div>
     <?php  }else{echo "<center><h1>No hay ningún producto registrado</h1></center>";} ?>
     
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
    .stock{
        color: #A72A11;
        font-size: 1vw;
        font-family: 'Fira Sans', sans-serif;
    }
    .cate{
        width: 50%;
        background: #F6F3ED;
        display: table;
        margin-top:-2%;
        margin-bottom: 1%;
    }
    .sel{
        width: 33%;

    }
    input[type="submit"]{
        width: 10%;
        position: relative;        
        display: table;
        margin-top:-9%;
        left:69%;
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