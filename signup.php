<?php
    require 'database.php'; 
?>

<html>
<style>
</style>
    <head>
    <?php 
        include "partials/nava.php"; ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    </head>
    <body>  
            <br><br>
                <form method="post" action="salvasign.php" enctype="multipart/form-data">   
                    <h4>Nuevo Usuario</h4><br>
                    <center>
                        <select name="rol">
                            <option value="">Seleccione una opcion</option>
                                <option value="0">Administrador</option>
                                <option value="1">Empleado</option>
                        </select>
                            <input name="user" type="text" placeholder="Usuario" required>
                            <input name="nombre" type="text" placeholder="Nombre(s)" required>
                            <input name="apellidop" type="text" placeholder="Apellido Paterno" required>
                            <input name="apellidom" type="text" placeholder="Apellido Materno" required>
                            <input name="edad" type="text" placeholder="Edad (Solo Numero)" required>
                            <input name="tel" type="text" placeholder="Telefono" required>
                            <input name="nss" type="text" placeholder="Numero de Seguro Social" required>
                            <input name="password" type="password" placeholder="Contraseña" required><br><br>
                            <input type="submit" value="Registrarse">
                    </center>
                </form>
    </body>
</html>