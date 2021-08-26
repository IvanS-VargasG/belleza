<script>
</script>
<?php
SESSION_START();
require "database.php";
$idprod = $_POST['id'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$usuario = $_SESSION['id'];
$sql = "SELECT * FROM ped_prod where id_prod = $idprod and id_user = $usuario";
$res = mysqli_query($con,$sql);
$fila = mysqli_fetch_assoc($res);
if(!empty($fila)){
    if ($cantidad==0) {
        header("location: listprod.php");
    }else{
    $can=$fila['cantidad'];    
    $cantidad += $can;  
    if ($cantidad <= $fila['cantidad'] && $cantidad != 0) {
        $sql = "UPDATE ped_prod SET cantidad='$cantidad', precio='$precio' WHERE id_prod='$idprod' AND id_user='$usuario'";
        $res = mysqli_query($con,$sql);
        header("location: listprod.php");
    }else{             
        header("location: listprod.php");
    }    }
                
}else{
    if ($cantidad==0) {
        header("location: listprod.php");
    }else{
    $sql = "INSERT INTO ped_prod values ($usuario, $idprod, $cantidad, $precio)";
    $res = mysqli_query($con,$sql);
    header("location: listprod.php");}
}
?>