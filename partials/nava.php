<?php
session_start();
$user=$_SESSION['user']; 
$varid=$_SESSION['id'];
$rol=$_SESSION['rol'];

if($varid==null||$varid==''){
    header('location: login.php');
}
if ($rol==0) {
?>
<link rel="shortcut icon" href="IMG/favicon.ico">
<nav>
		<ul>
        <li class="usuario"><em><?php echo $user; ?></em></li>
			<a href="usuarios.php"><li class="botones">Usuarios</li></a>
			<a href="aproductos.php"><li class="botones">Productos</li></a>
			<a href="orden.php"><li class="botones">Orden</li></a>
            <a href="reporte.php"><li class="botones">Reporte</li></a>
            <a href="logout.php"><li class="botones">Cerrar Sesión</li></a>            
		</ul>
	</nav>
<?php }else { ?>
    <nav>
		<ul>
        <li class="usuario"><em><?php echo $user; ?></em></li>			
			<a href="aproductos.php"><li class="botones">Venta</li></a>
			<a href="orden.php"><li class="botones">Orden</li></a>            
            <a href="logout.php"><li class="botones">Cerrar Sesión</li></a>            
		</ul>
	</nav>
<?php } ?>
    <html>
        <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
        </head>
    </html>
<style>
nav{
    margin-top: 1%;
    border-radius:10px;
    background: #f68e5f;
    height: 50px;
    margin: auto;
    margin-bottom: 5px;
    width: 75%;
}
nav ul{
    text-align: center;
    list-style: none;
    padding-left: 4px;
    width: 100%;
}
.usuario{
    color: #ffe785;
    font-size: 1.6vw;
    letter-spacing: 4px;
    font-family: 'Fira Sans', sans-serif;
    font-weight: bold;
    display: inline-block;
    line-height: 50px;
    padding-left: 10px;
    padding-right: 10px;
    margin: auto;
    text-decoration: none;
    vertical-align: middle;
    text-transform: uppercase;
}
nav ul .botones{
    color: #262626;
    font-size: 1.5vw;
    font-family: 'Fira Sans', sans-serif;
    font-weight: bold;
    display: inline-block;
    line-height: 50px;
    padding-left: 10px;
    padding-right: 10px;
    margin: auto;
    text-decoration: none;
    vertical-align: middle;
    text-transform: uppercase;
}
nav ul h3{
    color: #0AE9D8;
    font-size: 1.5vw;
    font-family: arial;
    font-weight: bold;
    display: inline-block;
    line-height: 50px;
    padding-left: 10px;
    padding-right: 10px;
    margin: auto;
    text-decoration: none;
    vertical-align: middle;
    text-transform: uppercase;
}
nav ul .botones:hover{
    color: #fbc9b2;
}
	</style>