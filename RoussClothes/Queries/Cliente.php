<?php 

    class Cliente{

        function createCliente($connection, $nombre, $telefono){
            //Add info to table
            $insert = "INSERT INTO clientes (Nombre, Telefono) VALUES ('$nombre', '$telefono')";
            //Check query
            if (mysqli_query($connection, $insert)) {
                echo "New record created successfully  ";
                echo("");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                echo("");
            }
        }


        function delelteCliente($connection, $usuario){
            $delete = "DELETE FROM clientes WHERE Nombre='$usuario'";
            if ($connection->query($delete) === TRUE) {
                echo "Record deleted successfully  ";
            } else {
                echo "Error deleting record: " . $connection->error;
            }
        }

        function editCliente($connection, $cambio,$cambiar ,$antiguo){
            $edit = "UPDATE clientes SET $cambio='$cambiar' WHERE $cambio='$antiguo'";
            if ($connection->query($edit) === TRUE) {
                echo "Record updated successfully  ";
            } else {
                echo "Error updating record: " . $connection->error;
        }
    
        }


    }



?>