<?php
require_once("conexion.php");
require_once("funciones.php");
if(isset($_POST["id"])){
    $id =$_POST["id"];

    $elimina = new funciones;
    $elimina->borrar($conexion, $id);

    echo "<script>window.location.href='../buscar.php'</script>";

}

?>