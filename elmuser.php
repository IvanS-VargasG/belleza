<?php
$con = mysqli_connect("localhost", "root", "root","productos"); 
$id = $_REQUEST['id'];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "UPDATE usuarios SET eliminado = 0 WHERE id=$id";
$res = mysqli_query($con,$sql);
header('Location: listausuarios.php');
?>