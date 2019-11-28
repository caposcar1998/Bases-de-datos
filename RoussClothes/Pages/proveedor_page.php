<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Inventario Rouss Clothes</title>

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <link type="text/css" rel="stylesheet" href = "../css/materialize/css/materialize.min.css" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
  <section id="container">

    <!--header-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="anadir_proveedor.php">Agregar </a></li>
            <li><a class="logout" href="login.html">Eliminar </a></li>
          <li><a class="logout" href="../index.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">


        <!-- Sub menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Rouss Clothes</h5>
          <li class="mt">
            <a class="active" href="../Pages/proveedor_page.php">
              <i class="fa fa-dashboard"></i>
              <span>Proveedores</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <a class="active" href="../Pages/cliente_page.php">
              <i class="fa fa-desktop"></i>
              <span>Clientes</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <a class="active" href="../Pages/empleado_page.php">
              <i class="fa fa-cogs"></i>
              <span>Empleados</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <a class="active" href="../Pages/ticket_page.php">
              <i class="fa fa-book"></i>
              <span>Tickets</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <a class="active" href="../Pages/usuario_page.php">
              <i class="fa fa-tasks"></i>
              <span>Usuarios</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <a class="active" href="../inventario.php">
              <i class="fa fa-th"></i>
              <span>Inventario</span>
              </a>
        </ul>
      </div>
    </aside>

    <section id="main-content">
      <section class="wrapper">

        <div class="row">
        
          <div class="col-lg-9 main-chart">

            <div class="custom-bar-chart">
            <table class="striped">
                
                <tr>
    
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cuenta Saldar</th>
                    <th>Tipo de pago</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    
                </tr>
                    
        <?php 
    
            include ("../Queries/Proveedor.php");
            
            $servername = "localhost:3306";
            $username = "oscar";
            $password = "1234";
            $dbname = "Roussclothes";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "SELECT * FROM proveedores";
            $result= $conn -> query($sql);
        
            if($result -> num_rows > 0){
                while ($row = $result -> fetch_assoc()){
                   $idToButton = $row["ID"];
                   console_log($idToButton);
                    echo "<tr><td>". $row["ID"]. "</td><td>". $row["Nombre"]. "</td><td>". $row["CuentaSaldar"]."</td><td>". $row["TipoPago"].
                    "</td><td>". $row["Telefono"]."</td><td>". $row["Direccion"]."</td><td>".
                    "<form method='POST'><a href='?run=first'><button id='$idToButton' name='$idToButton' onClick='reply_click(this.id)' class='material-icons'>delete</button></a></form>".
                    "</td><td>"."<a href='proveedor_page.php'><i class='material-icons'>edit</i></a>"."</td></tr>";
                    
                    
                  }
            echo "</table>";
        
            }else{
                echo ("Nada que mostrar");
            }

            
            
          $Id = 0;
            

          function deleteProveedor($conn, $Id){
            console_log("popo");
            $proveedor = new Proveedor();
            $proveedor -> deleteProveedor($conn, $Id);
          }
            if (isset($_GET['run'])) $linkchoice=$_GET['run'];
            else deleteProveedor($conn, $Id);

            switch($linkchoice){

            case 'first' :
              deleteProveedor($conn, $Id);
                break;
            default :
                echo 'no run';

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
    
                
                </table>
              
            </div>


      
</section>
  </section>



  </body>

</html>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
  </script>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);


    }

    function reply_click(clicked_id)
  {
      alert(clicked_id);
  }

  </script>



 
 