<?php
require_once("logica/conexion.php");
require_once("logica/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <title>Actualizar Datos</title>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $datos = new funciones;
    $elementos = $datos->porip($conexion,$id);
    ?>
    <h2>Actualizar datos</h2>  
    <div class="formularios">
       
       
        
       
       
       
      
        <form action="" id="form">
            <input type="hidden" name="idb" id="idb"value="<?php echo $elementos[0][0] ?>" >
            <label for="">ID de PlayStation:</label><br>
            <input type="text" name="idpsn" id="idpsn" value="<?php echo $elementos[0][1]?>"><br> 
            <label for="">IP:</label><br>
            <input type="text" name="ip" id="ip" value="<?php echo $elementos[0][2]?>"><br> 
            <label for="">Pais:</label><br>
            <input type="text" name="pais" id="pais" value="<?php echo $elementos[0][3]?>"><br>  
            <label for="">Vpn:</label>
            <input type="checkbox" name="vpn"  id="vpn"><br>
            <label for="">Puerto:</label><br>
            <input type="text" name="puerto" id="puerto" value="<?php echo $elementos[0][5]?>"><br><br>
            <input type="submit" value="Guardar">
            <button><a href="buscar.php">Cancelar</a></button>
        </form>
        </div>
    </div>
    <div id="aviso"></div>
    <script src="js/actualiza.js"></script>
</body>
</html>