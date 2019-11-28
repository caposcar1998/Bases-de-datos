<?php

include ("Queries/Proveedor.php");
include ("Queries/Usuario.php");
include ("Queries/Ticket.php");
include ("Queries/Cliente.php");
include ("Queries/Prenda.php");
include ("Queries/Empleado.php"); 

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
    echo("eres grande drake");
}


$proveedor = new Proveedor;
$usuario = new Usuario;
$ticket = new Ticket;
$prenda = new Prenda;

/*
$ticket -> createTicket($conn);
$proveedor -> createProveedor($conn);
$proveedor -> delelteProveedor($conn);
$proveedor -> editProveedor($conn);
/*

/*

IMPORTANT NOTE: EVERYTHING USSES conn variable

*/ 


//ALWAYS CLOSE CONNECTION
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Systema de ventas</title>
</head>

<body>

    
    </body>

</html>