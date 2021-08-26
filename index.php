
<?php
session_start();

require 'database.php';

if(isset($_SESSION['usuarios_id'])){
    $records= $conn->prepare('SELECT email, password , id FROM usuarios WHERE id=:id');
    $records->bindParam(':id', $_SESSION['usuarios_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    $user=null;

    if(count($results) > 0) {
        $user=$results;
    }
}
?>

<html>
    <style>
    .logoi{
        width: 100%;
        height: 100%;
        margin: auto;
        vertical-align: "center";
    }
    .circulo {
        margin-top: 8%;
        position: relative;
        width: 23%;
        height: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background: #FFFFFF;
    }
    .circulo:hover{
        background-color: #cfbfa0;
    }
    h2:hover{
        color: #004aad;
    }
    </style>
    <head>
        <meta charset="utf-8">
        <title>Belleza</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="partials/style.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body>
        <center>
        <div class="circulo">
        <a href="login.php"><img class="logoi" src="IMG/belleza.png" alt=""></a>
        </div> <a href="login.php"><h2>Iniciar Sesion</h2></a></center>        
    </body> 
    
</html>