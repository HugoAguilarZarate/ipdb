<?php
require_once("conexion.php");
require_once("funciones.php");

if(isset($_GET["pais"])){
    $pais = $_GET["pais"];

    $buscarpais = new funciones;
    echo $buscarpais->muestrapais($conexion,$pais);
    
}
if(isset($_GET["dato"])){

    if($_GET["dato"]=="Enviar todo"){
        $todo = new funciones;
        echo $todo->muestratodo($conexion);
    }
    else if($_GET["dato"]=="vpn"){
        $vpn = new funciones;
        echo $vpn->muestravpn($conexion);

    }

}
if(isset($_GET["buscador"])){

    $dato = $_GET["buscador"];

    $buscar = new funciones;
    echo $buscar->buscador($conexion, $dato);


}
?>