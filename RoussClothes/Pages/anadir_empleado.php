<!DOCTYPE html> 

<html>

    <head>
    <link type="text/css" rel="stylesheet" href = "../css/materialize/css/materialize.min.css" media="screen,projection"/>
        <title>Añadir Cliente</title>

    </head>

    <body>
  <div class = "container"> 
    
    <form  method="POST" enctype="multipart/form-data">

      <label>Nombre:</label>
      <input type="text" id="nombre" name="nombre"/>
     
      <label>Sueldo:</label>
      <input type="text" id="sueldo" name="sueldo"/>
      
      <label>Puesto</label>
        <input type="text" id="puesto" name="puesto"/>

      <br>
      <br>
      <br>
      <button class="btn waves-effect waves-light" type="subir" name="action">Ingresar </button>
    </form>

    </body>

    <script type="text/javascript" src="../css/materialize/js/materialize.min.js"></script>
</html>


<?php 

include("../Queries/Empleado.php");

$empleado = new Empleado();
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

$nombre = $_POST['nombre'];
$sueldo =(float)$_POST['sueldo'];
$puesto = $_POST['puesto'];



$empleado -> createEmpleado($conn, $nombre, $sueldo, $puesto);

echo'<script type="text/javascript">
    alert("Empleado Guardado");
    window.location.href="empleado_page.php";
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