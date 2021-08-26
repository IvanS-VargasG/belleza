<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <?php include "partials/nava.php"; ?>
<title>Orden</title>
</head>
<?php   
    require "database.php";     
    $idus=$_SESSION['id']; 
    $sql="SELECT proveedor.nombre, ped_prod.id_prod, ped_prod.cantidad, ped_prod.precio, ped_prod.id_user
    FROM ped_prod JOIN proveedor ON
    proveedor.id=ped_prod.id_prod AND ped_prod.id_user=$idus";
    $res=mysqli_query($con,$sql);
    $num=mysqli_fetch_assoc($res);  
    if (!empty($num)) {                  
?>
<body>
<div id="tabla">
<table align=center class=rounded> 
<tr>
<td><p>Nombre</p></td>
<td><p>Cantidad</p></td>
<td><p>Precio Unitario</p></td>
<td><p>Subtotal</p></td>  
<td><p>Total</p></td>
<script src="jquery-3.3.1.min.js"></script>
<script>
function enviar(id){
$.ajax({
                    url     : 'pagar.php',
                    type    : 'post',
                    dataType:  'text',
                    data    :  'ide='+id,
                    success :  function(res){ 
                        if (res) {
                            alert('Se completo la venta!');
                            location.href="orden.php"; 
                        }                                                                      
                    },error:function(){
                        alert('Error al conectar al servidor...');
                    }
                });//termina ajax()
            }
</script>
</tr>
         <?php 
         $total=0;

	 		do 
	 		{
	 	?>
	 	<tr class="dinamica">
         <td><p><?php echo $num['nombre']; ?></p></td>
			 <td><p><?php echo $num['cantidad']; ?></p></td>
			 <td><p>$<?php echo $num['precio']; ?></p></td>
             <td><p>$<?php echo $num['precio']*$num['cantidad']; ?></p></td>             
             <td><?php echo "<a href=\"elmorde.php?id=".$num['id_prod']."\">"; ?><input type="button" name="eliminar" value="Eliminar"></a></td>	 		             
	 	</tr>
	 	<?php
         $total+=$num['precio']*$num['cantidad'];
             }while($num = mysqli_fetch_assoc($res)); 
             echo "<td colspan=\"3\"><p>Total</p></td>";
             echo "<td colspan=\"1\"><p>$$total</p></td>";
	 	 ?>
            <td colspan="5"><a href="<?php echo "pagpdf.php?id=".$idus; ?>"><input type="button" onclick="enviar(<?php echo $idus; ?>);" value="Pagar"></a></td>            
	 </table>
     </div>
    <?php } else{echo "<h1 align=\"center\"> No ha agregado ningun producto </h1>";}?>

</body>
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
</html>