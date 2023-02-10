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
    <title>Buscar</title>
</head>
<body>
    <header>
        <h3>IP Data Base</h3>
        <button class="header"><a href="guardar.html">Guardar</a></button>
        <button class="header"><a href="buscar.php">Buscar</a></button>
    </header>
    <h2>Buscar datos</h2>
    <div id="barra">
        <div>
            <label for="">Barra de busqueda</label><br>
            <input type="text" id="buscador" name="buscador" placeholder="Buscador"> 
        </div>
        <div>
       
    
        <label for="">Buscador rapido</label><br>
        <button onclick="todo()">Mostrar todo</button>
        <button onclick="vpn()">Mostrar solo VPN</button>
        <label for="">Pais</label>
        <select name="pais" id="pais" onchange="seleccion()">
            <option value="ninguno">Ninguno</option>
            <?php
            $listado = new funciones;
            $lista = $listado->listapaises($conexion);
            
            while($listapaises = mysqli_fetch_array($lista)){
            ?>
            <option class="pais" value="<?php echo $listapaises["pais"];?>"><?php echo $listapaises["pais"];?></option>
            <?php
            }
            ?>   
        </select>
        </div>
       
    </div>
   
    
    
        <table>
        <thead>
        <tr>
          <th>ID</th>
          <th>ID PlayStation</th>
          <th>Ip</th>
          <th>Pais</th>
          <th>Vpn</th>
          <th>Puerto</th>
          <th>Ultima modificación </th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody id="datos">
        
      </tbody>
        </table>
    
    <script src="js/busca.js"></script>
    
</body>
</html>