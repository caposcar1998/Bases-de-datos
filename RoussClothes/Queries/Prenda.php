<?php 

    class Prenda{

        function createPrenda($connection, $nombre, $precio, $costo, $talla, $color, $tematica,$material ,$calidad, $localizacion, $proveedorId){
            //Add info to table

            $insert = "INSERT INTO prendas (Nombre, Precio, Costo, Talla, Color, Tematica, Material, Calidad, Localizacion, ProveedorId)
                VALUES                    ('$nombre', '$precio', '$costo', '$talla', '$color', ' $tematica', '$material', '$calidad','$localizacion','$proveedorId')";
            //Check query
            if (mysqli_query($connection, $insert)) {
                echo "New record created successfully  ";
                echo("");
            } else {
                echo "Error: ".  $connection->error; ;
                echo("");
            }
        }

        function deleltePrenda($connection){
            $delete = "DELETE FROM prendas WHERE Nombre='Manuel'";
            if ($connection->query($delete) === TRUE) {
                echo "Record deleted successfully  ";
            } else {
                echo "Error deleting record: " . $connection->error;
            }
        }

        function editPrenda($connection){
            $edit = "UPDATE prendas SET Nombre='Itzorra' WHERE Nombre='Manuel'";
            if ($connection->query($edit) === TRUE) {
                echo "Record updated successfully  ";
            } else {
                echo "Error updating record: " . $connection->error;
        }
    
        }




    }




?>