<?php
//Archivo con todas las funciones que hacen peticiones a la base de datos
class funciones{

    function verificaip($conexion, $ip){

        $verifica = "SELECT ip FROM ip WHERE ip = '$ip' ";
        $vquery = mysqli_query($conexion, $verifica);
        return $vquery;

    }

    function Guardar($conexion, $idpsn, $ip, $puerto, $vpn, $pais){

        $fecha = date("y/m/d");

        $guardar = "INSERT INTO ip (idpsn, ip, pais, vpn, puerto, fguardado) VALUES ('$idpsn','$ip','$pais','$vpn','$puerto','$fecha')";
        $gquery = mysqli_query($conexion, $guardar);

    }
    function listapaises($conexion){

        $buscarpais = "SELECT DISTINCT pais FROM ip";
        $querylistado = mysqli_query($conexion, $buscarpais);
        return $querylistado;

    }
    function muestratodo($conexion){

        $todo = "SELECT * FROM ip";
        $qtodo = mysqli_query($conexion, $todo);
        $result = $qtodo->fetch_All();
        return json_encode($result);


    }
    function muestrapais($conexion, $pais){

        $porpais = "SELECT * FROM ip WHERE pais = '$pais'";
        $qpais = mysqli_query($conexion, $porpais);
        $result = $qpais->fetch_All();
        return json_encode($result);

    }
    function muestravpn($conexion){

        $porvpn = "SELECT * FROM ip WHERE vpn ='VPN'";
        $qvpn = mysqli_query($conexion, $porvpn);
        $result = $qvpn->fetch_All();
        return json_encode($result);


    }
    function buscador($conexion, $dato){

        $buscaporid = "SELECT * FROM ip WHERE idpsn ='$dato'";
        $queryid = mysqli_query($conexion, $buscaporid);

        if(mysqli_num_rows($queryid)!=0){
            $result = $queryid->fetch_all();
            return json_encode($result);

        }else{
            $buscaporip = " SELECT * FROM ip WHERE ip ='$dato'";
            $queryip = mysqli_query($conexion, $buscaporip);

            if(mysqli_num_rows($queryip)!=0){
                $result = $queryip->fetch_All();
                return json_encode($result);

            }else{
                $buscarpuerto = "SELECT * FROM ip WHERE puerto = '$dato'";
                $querypuerto = mysqli_query($conexion, $buscarpuerto);

                if(mysqli_num_rows($querypuerto)!=0){
                    $result = $querypuerto->fetch_all();
                    return json_encode($result);

                    
                }else{
                    $buscarpais = "SELECT * FROM ip WHERE pais = '$dato'";
                    $querypais = mysqli_query($conexion, $buscarpais);

                    if(mysqli_num_rows($querypais)!=0){
                        $result = $querypais->fetch_all();
                        return json_encode($result);

                    }else{
                        $buscariddb = "SELECT * FROM ip WHERE id = '$dato'";
                        $queryiddb = mysqli_query($conexion, $buscariddb);

                        if (mysqli_num_rows($queryiddb)!=0){
                            $result = $queryiddb->fetch_all();
                            return json_encode($result);

                        }else{
                            return json_encode("no hay resultados");
                        }



                    }
                }
            }
        }
    }
    function porip($conexion, $id){

        $buscarip = "SELECT * FROM ip WHERE id ='$id'";
        $queryip = mysqli_query($conexion, $buscarip);
        $result = $queryip->fetch_all();
        return $result;
    }
    function actualiza($conexion, $id, $idpsn, $ip, $puerto, $vpn, $pais){
        $fecha = date("y/m/d");
        $actualiza = "UPDATE ip SET idpsn ='$idpsn', ip = '$ip', puerto = '$puerto', vpn = '$vpn', pais = '$pais', fguardado='$fecha' WHERE id ='$id'";
        $queryactualiza = mysqli_query($conexion, $actualiza);

    }
    function borrar($conexion, $id){
        $borra = "DELETE FROM ip WHERE id = '$id'";
        $queyborra = mysqli_query($conexion, $borra);
    }

}

?>