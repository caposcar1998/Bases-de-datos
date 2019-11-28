<?php 


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
  $pass = $_POST['pass'];
  $query = "SELECT Nombre, Contrasena from usuarios where Nombre=? AND Contrasena=? LIMIT 1";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $nombre, $pass);
  $stmt->execute();
  $stmt->bind_result($username, $password);
  $stmt->store_result();
  
  if ($stmt->fetch()) {
    header("location: inventario.php"); 
    console_log("cambio");
  }else{
    console_log("no");
  }

}
  

  
  




  function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

  
  
  //ALWAYS CLOSE CONNECTION
  $conn->close();



?>


<!DOCTYPE html> 

<html>

    <head>
    <link type="text/css" rel="stylesheet" href = "css/materialize/css/materialize.min.css" media="screen,projection"/>
        <title>Acceso</title>

    </head>

    <body>
  <div class = "container"> 
    
    <form  method="post" enctype="multipart/form-data" >

      <label>Nombre:</label>
      <input type="text" id="nombre" name="nombre"/>
     
      <label>Contraseña:</label>
      <input type="password" id="pass" name="pass"/>

      <button class="btn waves-effect waves-light" type="submit" id="submit" name="action">Ingresar </button>
    </form>

    </body>

    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
</html>

