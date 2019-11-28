<?php 

    class Empleado{


        function createEmpleado($connection, $nombre,$sueldo, $puesto){
            //Add info to table
            $insert = "INSERT INTO empleados (Nombre, Sueldo, BonoSemanal, VentasTotales, Puesto) VALUES ('$nombre', '$sueldo', 0, 0, '$puesto')";
            //Check query
            if (mysqli_query($connection, $insert)) {
                echo "New record created successfully  ";
                echo("");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                echo("");
            }
        }

        function delelteEmpleado($connection){
            $delete = "DELETE FROM empleados WHERE Nombre='Manuel'";
            if ($connection->query($delete) === TRUE) {
                echo "Record deleted successfully  ";
            } else {
                echo "Error deleting record: " . $connection->error;
            }
        }

        function editUsuario($connection){
            $edit = "UPDATE empleados SET Nombre='Itzorra' WHERE Nombre='Manuel'";
            if ($connection->query($edit) === TRUE) {
                echo "Record updated successfully  ";
            } else {
                echo "Error updating record: " . $connection->error;
        }
    
        }


    }



?>