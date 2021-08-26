<html lang="es">
<?php include "partials/nava.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Producto</title>    
</head>

<?php           
    $con = mysqli_connect("localhost", "root", "root","productos");
    $sql="SELECT *
    FROM proveedor
    WHERE elim=0";
    $res=mysqli_query($con,$sql);
    $num=mysqli_fetch_assoc($res);        
    if($num==NULL){
        echo "<h1 align=\"center\"> No existen Datos </h1>";
    }else{            
?>

  <body>    
  <center>  
  <div class="contenedor">
	 	<?php 
	 		do 
	 		{
	 	?>
            <div class="tabla">            
            <?php echo "<a href=\"compra.php?id=".$num['id']."\">"; ?>
            <img class="imgedit" src="<?php if($num['archivo']==null) { echo "IMG/noIMG.png"; }else{ echo "IMGprodu/".$num['archivo'];} ?>" style="width:200px;height:150px;">            
            <p><?php echo $num['marca'];  ?></p>
            <p><?php echo $num['nombre'];  ?></p>
            <p><?php echo "$".$num['precio'];  ?></p>
            <p><?php 
             if($num['stock']<10){ ?>
             <p class="stock"><?php echo "Stock:".$num['stock'];?></p>
             <?php }else{ echo "Stock:".$num['stock'];}?></p></a>
             </div> 
	 	<?php
	 		}while($num = mysqli_fetch_assoc($res)); 
	 	 ?>
    </div>      
         
        </center>
    <?php } ?>
  </body>
  <style>
  .imgedit{
        margin-top: 7%;
    }
    .contenedor{
        width: 75%;
        margin-top: 1%;
        background: #ddd2bb;
        justify-content: center;
        align-items: center;
        padding: 30px;
        display: table;
        border-radius: 20px;
    }
    .tabla{
        background: #07a0c3;
        width: auto;        
        margin-left: 3.7%;
        margin-bottom: 3%;
        border-radius: 30px; 
        float:left;
        display: table-cell;
        position: middle;
    }
    p{
        line-height: 10px;
    }
    .stock{
        color: #A72A11;
        font-size: 1vw;
        font-family: 'Fira Sans', sans-serif;
    }
    .tabla:hover{
        background-color: #63b0cd;
    }
    </style>
</html>