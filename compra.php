<?php
require 'database.php';
$id=$_GET['id'];
$con = mysqli_connect("localhost", "root", "root","productos");
    $sql="SELECT *
    FROM proveedor
    WHERE id='$id'";
    $res=mysqli_query($con,$sql);
    $dato=mysqli_fetch_assoc($res); 
$conn = mysqli_connect("localhost", "root", "","productos");
    $sql="SELECT *
    FROM ped_prod";
    $res=mysqli_query($conn,$sql);
    $fila=mysqli_fetch_assoc($res);       
    if ($fila==null) {    
        $cantus=0;
    }else{
        $cantus=$fila['cantidad'];
    }
?>
<html>
<?php include "partials/nava.php"; ?>
<style>
h3{
    color: #EE7158;
    font-family: verdana;
    font-size: 0.8vw;
    font-weight: bold;
    height: 30px;
    text-align: center;
    text-transform: uppercase;
    vertical-align: middle;
    width: 100%;
}
    h1{
        color: #EE7158;
        font-family: verdana;
        font-size: 1.9vw;
        font-weight: bold;
        line-height: 50px;
        height: 50px;
        margin-top: 5%;
        text-align: center;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
    }
    h1:hover{
        color: #eb5133;
    }
    .detusu{
        margin-top: 3%;
        background: #ddd2bb;
        text-align: middle;
        border-collapse: collapse;
        border-spacing: 10;
        border-radius: 25px;  
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        width: 50%;
    }
    th, td{
        color: #2F2F2F;
        cursor: context-menu;
        font-size: 1vw;
        font-family: 'Fira Sans', sans-serif;
        padding: 15px;
        text-align: center;
    }
    .pma{
        color: #F68E5F;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    .pcui{
        color: #6C61B8;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    .pAss{
        color: #2c72a0;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    .ptin{
        color: #FF47FF;
        font-size: 1vw;
        cursor: context-menu;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    .pbar{
        color: #0475B8;
        cursor: context-menu;
        font-size: 1vw;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    .pnss{
        color: #2fb007;
        cursor: context-menu;
        font-size: 1vw;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
    img{                
        width: 20%;
        cursor: context-menu;
    }
    .pstock{
        color: #A72A11;
        cursor: context-menu;
        font-size: 1vw;
        font-weight: bold;
        font-family: 'Fira Sans', sans-serif;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Detalles</title>
</head>
<script src="jquery-3.3.1.min.js"></script>
<script>

function enviar(id){
    var cantidad =document.ajax.num.value;
    var precio =document.ajax.precio.value;    
    var cantidus =document.ajax.cantus.value;    
    var cantidprod =document.ajax.cantidprod.value;
    var aux;
    aux = parseInt(cantidus)+parseInt(cantidad);
$.ajax({
                    url     : 'agregcarr.php',
                    type    : 'post',
                    dataType:  'text',
                    data    :  'id='+id+'&cantidad='+cantidad+'&precio='+precio,
                    success :  function(res){                         
                        if(cantidad == 0){                            
                            alert('Error: Debe selecionar una cantidad');
                            window.locationf="listprod.php";
                        }
                        if (aux > cantidprod) {
                            alert('Error: La suma de los productos es mayor al stock de '+cantidprod);
                            window.locationf="listprod.php";
                        }
                        if(res){    
                        }
                        else{
                            alert('Error de envio de datos');
                        }
                    },error:function(){
                        alert('Error al conectar al servidor...');
                    }
                });//termina ajax()
            }
</script>
<body align="center" >
<br><br><br>
    <form action="agregcarr.php" name="ajax">
    <h3>¿Cuantos productos desea agregar a la orden?</h3>
    <select name="num">
        <option value="0">Seleccione una cantidad</option>
        <?php  for($i= 1; $i<=$dato['stock']; $i++ ){ ?>
        <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
        <?php } ?>
        </select>    
    </select>
    <input type="submit" onclick="enviar(<?php echo $dato['id']; ?>);" value="Agregar Orden">
    <input name="precio" type="hidden" value="<?php echo $dato['precio'];  ?>">
    <input name="cantus" type="hidden" value="<?php echo $cantus; ?>">
    <input name="cantidprod" type="hidden" value="<?php echo $dato['stock'];  ?>">
    </form>

    <table class="detusu" align="center">    
    <tr><td><br>Marca: <?php echo $dato['marca']; ?></td><td>Nombre: <?php echo $dato['nombre'];  ?></td></tr>
    <tr><td>Categoria<?php if($dato['categoria']==0){ ?> <p class="pma"> <?php echo "Maquillaje"; ?> </p> 
    <?php }if($dato['categoria']==1){ ?> <p class="pcui"> <?php echo "Cuidado de la Piel"; ?> </p> <?php } ?>
    <?php if($dato['categoria']==2){ ?> <p class="pAss"> <?php echo "Aseo Personal"; ?> </p> 
    <?php }if($dato['categoria']==3){ ?> <p class="ptin"> <?php echo "Tintes de Cabello"; ?> </p> <?php } ?>
    <?php if($dato['categoria']==4){ ?> <p class="pbar"> <?php echo "Barberia"; ?> </p> <?php }?></td>
    <td>Precio<p class="pnss"><?php echo "$".$dato['precio'] ?></p></td></tr>
    <tr><td colspan="2">Stock <p class="pnss"><?php if($dato['stock']>9){ echo $dato['stock']; ?></p><?php }else{?><p class="pstock"><?php echo $dato['stock']; }?></p></td></tr>
    <tr><td colspan="2"><img src="<?php if($dato['archivo']==null) { echo "IMG/noIMG.png"; }else{ echo "IMGprodu/".$dato['archivo'];} ?>" alt=""></td></tr>
    <tr><td colspan="2"><a href="listprod.php"><h1>Regresar</h1></a></td></tr>
    </table> 

</body>
</html>