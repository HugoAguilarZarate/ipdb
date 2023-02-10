<?php
//Arhcivo de conexion con la base de datos, se manda a llamar desde otros archivos
try{
    $server = "localhost";
    $database = "ipdb";
    $user = "root";
    $pass = "";

    $conexion = mysqli_connect($server, $user, $pass, $database);

}catch(Exception $ex){
    echo"<script>window.alert('Error de conexión')</script>";
    echo "<script>window.location.href='../index.html';</script>";
}

?>