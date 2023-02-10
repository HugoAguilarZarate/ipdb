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
    <title>Eliminar datoss</title>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $datos = new funciones;
    $elementos = $datos->porip($conexion,$id);
    ?>
    <h2>Eliminar datos</h2>
    <div class="formularios">
        <form action="logica/delete.php" method="post">
            <h3>¡Los siguientes datos seran eliminados de la base de datos!</h3>
            <label for="">Id de base de datos: </label>
            <input type="text" class="ronly" name="id"value="<?php echo $elementos[0][0] ?>" readonly><br>
            <label for="">Id de PlayStation: <?php echo $elementos[0][1] ?> </label><br>
            <label for="">Ip: <?php echo $elementos[0][2] ?></label><br>
            <label for="">Pais: <?php echo $elementos[0][3] ?></label><br>
            <label for="">VPN: <?php echo $elementos[0][4] ?></label><br>
            <label for="">Puerto: <?php echo $elementos[0][5] ?></label><br>
            <label for="">Ultima modificación: <?php echo $elementos[0][6] ?></label><br>
            <input type="submit" value="Confirmar">
            <button><a href="buscar.php">Cancelar</a></button>
        </form>
    </div>
    
</body>
</html>