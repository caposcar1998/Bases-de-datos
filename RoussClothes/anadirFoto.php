
<!DOCTYPE html> 

<html>

    <head>
    <link type="text/css" rel="stylesheet" href = "css/materialize/css/materialize.min.css" media="screen,projection"/>
        <title>Añadir foto</title>

    </head>

    <body>
  <div class = "container"> 
    
    <form  method="POST" enctype="multipart/form-data">

      <label>Nombre:</label>
      <input type="text" id="nombre" name="nombre"/>
     
      <label>Precio:</label>
      <input type="text" id="precio" name="precio"/>

      <label>Costo:</label>
      <input type="text" id="costo" name="costo"/>

      <label>Talla:</label>
      <input type="text" id="talla" name="talla"/>

      <label>Color:</label>
      <input type="text" id="color" name="color"/>

      <label>Tematica:</label>
      <input type="text" id="tematica" name="tematica"/>

      <label>Material:</label>
      <input type="text" id="material" name="material"/>

      <label>Calidad:</label>
      <input type="text" id="calidad" name="calidad"/>

      <label>Localizacion:</label>
      <input type="text" id="localizacion" name="localizacion"/>

      <label>Proveedor:</label>
      <input type="text" id="proveedor" name="proveedor"/>
      <br>
      <br>
      <br>
      <label>Foto</label>
      <input type="file" id="image" name="image" />
      <br>
      <br>
      <br>
      <button class="btn waves-effect waves-light" type="subir" name="action">Ingresar </button>
    </form>

    </body>

    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
</html>


<?php 

include("Queries/Prenda.php");

$prenda = new Prenda;
$servername = "localhost:3306";
$username = "oscar";
$password = "1234";
$dbname = "Roussclothes";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    console_log("Conexion Correcta a base");
}



if (!empty($_POST["nombre"])) {
$result = $mysqli->query("SELECT Nombre FROM prendas WHERE Nombre = 'nombre'");

console_log("lleno");
$nombre = $_POST['nombre'];
$precio = (float) $_POST['precio'];
$costo = (float) $_POST['costo'];
$talla = $_POST['talla'];
$color = $_POST['color'];
$tematica = $_POST['tematica'];
$material = $_POST['material'];
$calidad = $_POST['calidad'];
$localizacion = $_POST['localizacion'];
$proveedorId = (int )$_POST['proveedor'];



$prenda -> createPrenda($conn, $nombre,$precio, $costo, $talla, $color, $tematica, $material ,$calidad, $localizacion, $proveedorId);

echo'<script type="text/javascript">
    alert("Producto Guardado");
    window.location.href="inventario.php";
    </script>';
    
}else{
  echo'<script type="text/javascript">
    alert("Favor de llenar todos los campos");
    ;
    </script>';

} 
 



$conn->close();



function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
  }
  echo $js_code;
}

?>
