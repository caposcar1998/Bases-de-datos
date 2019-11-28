<?php 

    class Usuario{

        function createUsuario($connection, $nombre, $contrasena){
            //Add info to table
            $insert = "INSERT INTO usuarios (Nombre, Contrasena) VALUES ('$nombre', '$contrasena')";
            //Check query
            if (mysqli_query($connection, $insert)) {
                echo "New record created successfully  ";
                echo("");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                echo("");
            }
        }

        function delelteUsuario($connection){
            $delete = "DELETE FROM usuarios WHERE Nombre='Manuel'";
            if ($connection->query($delete) === TRUE) {
                echo "Record deleted successfully  ";
            } else {
                echo "Error deleting record: " . $connection->error;
            }
        }

        function editUsuario($connection){
            $edit = "UPDATE usuarios SET Nombre='Itzorra' WHERE Nombre='Manuel'";
            if ($connection->query($edit) === TRUE) {
                echo "Record updated successfully  ";
            } else {
                echo "Error updating record: " . $connection->error;
        }
    
        }

    }



?>