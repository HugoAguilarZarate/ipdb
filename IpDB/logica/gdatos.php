<?php
//Realiza todas las operaciones de insetar y actualizar
require_once("funciones.php");
require_once("conexion.php");

$idpsn = $_POST["idpsn"];
$ip = $_POST["ip"];
$puerto = $_POST["puerto"];
$vpn = $_POST["vpn"];
$pais = $_POST["pais"];

try{

    if(isset($_POST["idb"])){
        //Actualizar
        $id = $_POST["idb"];
        $actualizar = new funciones;
        $actualizar->actualiza($conexion, $id, strtolower($idpsn), $ip, $puerto, $vpn, ucfirst($pais));
        echo json_encode("correcto");
 

    }else{
        //Insertar
        $verifica = new funciones;
        $verificar = $verifica->verificaip($conexion, $ip);

        if (mysqli_num_rows($verificar)!=0){
            echo json_encode("iprepetida");
    
        }else if(mysqli_num_rows($verificar)==0){  
            $guardar = new funciones;
            $guardar->Guardar($conexion, strtolower($idpsn), $ip, $puerto, $vpn, ucfirst($pais));
            echo json_encode("correcto");
    
        }

    }
    
}
catch(Exception $e){
    echo json_encode("error");

}
    

?>