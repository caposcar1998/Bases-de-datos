<?php

class Proveedor{


    function createProveedor($connection, $nombre, $tipoPago, $telefono, $direccion){
        //Add info to table
        $insert = "INSERT INTO proveedores (Nombre, CuentaSaldar, TipoPago, Telefono, Direccion) 
                                    VALUES ('$nombre', 0,'$tipoPago', '$telefono', '$direccion')";
        //Check query
        if (mysqli_query($connection, $insert)) {
            echo "New record created successfully  ";
            echo("");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            echo("");
        }
    }

    function deleteProveedor($connection, $Id){
        $delete = "DELETE FROM proveedores WHERE ID='$Id'";
        if ($connection->query($delete) === TRUE) {
            echo "Record deleted successfully  ";
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    }

    function editProveedor($connection){
        $edit = "UPDATE proveedores SET Nombre='Itzorra' WHERE Nombre='Manuel'";
        if ($connection->query($edit) === TRUE) {
            echo "Record updated successfully  ";
        } else {
            echo "Error updating record: " . $connection->error;
    }

    }
        
    

}



?>


