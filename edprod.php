<?php
    require 'database.php'; 
?>

<html>
<style>
  input[type="file"]{
    display:none;
  }
  label{    
    color: #F6F3ED;
    background-color: #f68e5f;
    height: 5%;
    width: 13%;
    position: absolute;
    clear: both;
    display: table;
    margin: auto;
    font-size: 1vw;
    left: 0;
    border-radius: 10px;
    right:0;
    font-family: 'Fira Sans', sans-serif;
    justify-content: center;
    text-align
    align-items: right;    
  }
  img{
    margin-top: 3%;
    float:center; 
  }
</style>
    <head>
    <?php include "partials/nava.php"; 
      $id = $_REQUEST['id'];
      require 'database.php';
      $con = mysqli_connect("localhost", "root", "root","productos");
      $sql= "SELECT * FROM proveedor WHERE id ='$id'";
      $res=mysqli_query($con,$sql);
      $fila=mysqli_fetch_assoc($res);
    ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Producto</title>
        <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">    
    </head>
    <body>  
            <br><br>
                <form method="post" action="salvaditaprod.php" enctype="multipart/form-data">   
                    <h4>Editar Producto</h4><br>
                    <center>
                        <select name="rol">   
                        <?php if($fila['categoria']==0){ ?>
                                <option value="0">Maquillaje</option>
                                <option value="1">Cuidado de la piel</option>
                                <option value="2">Aseo personal</option>
                                <option value="3">Tintes de cabello</option>
                                <option value="4">Barberia</option>
                             <?php }if($fila['categoria']==1){ ?>                                
                                <option value="1">Cuidado de la piel</option>
                                <option value="0">Maquillaje</option>
                                <option value="2">Aseo personal</option>
                                <option value="3">Tintes de cabello</option>
                                <option value="4">Barberia</option>
                            <?php }if($fila['categoria']==2){ ?>
                                <option value="2">Aseo personal</option>
                                <option value="0">Maquillaje</option>
                                <option value="1">Cuidado de la piel</option>
                                <option value="3">Tintes de cabello</option>
                                <option value="4">Barberia</option>
                            <?php }if($fila['categoria']==3){ ?>
                                <option value="3">Tintes de cabello</option>
                                <option value="0">Maquillaje</option>
                                <option value="1">Cuidado de la piel</option>
                                <option value="2">Aseo personal</option>
                                <option value="4">Barberia</option>
                            <?php }if($fila['categoria']==4){ ?>
                                <option value="4">Barberia</option>
                                <option value="0">Maquillaje</option>
                                <option value="1">Cuidado de la piel</option>
                                <option value="2">Aseo personal</option>
                                <option value="3">Tintes de cabello</option>
                            <?php } ?>
                        </select>
                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                            <input name="marca" type="text" value="<?php echo $fila['marca']; ?>" placeholder="Marca del producto" required>
                            <input name="nombre" type="text" value="<?php echo $fila['nombre']; ?>" placeholder="Nombre del producto" required>
                            <input name="precio" type="text" value="<?php echo $fila['precio']; ?>" placeholder="Costo del producto" required>
                            <input name="stock" type="text" value="<?php echo $fila['stock']; ?>" placeholder="Stock del producto" required>
                            <input type="file" id="file" name="archivo" aria-label="Archivo">
                            <label for="file">
                              <img src="IMG/addIMG.png">
                                Seleccione una foto 
                            </label>
                            <br><br><br><br>
                            <input type="submit" value="Editar">
                    </center>
                </form>
    </body>
</html>