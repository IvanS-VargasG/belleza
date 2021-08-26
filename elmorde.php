<?php
require "database.php";
$id = $_REQUEST['id'];
$sql = "DELETE FROM ped_prod WHERE id_prod=$id";
$res = mysqli_query($con,$sql);
echo $res;
header('Location: orden.php');
?>