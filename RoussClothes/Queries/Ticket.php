<?php 


    class Ticket{

        function createTicket($connection){
            //Add info to table
            $insert = "INSERT INTO tickets (Fecha, Hora, Monto) VALUES ('2019-11-23','2013-07-17 18:33:55 ', 500)";
            //Check query
            if (mysqli_query($connection, $insert)) {
                echo "New record created successfully  ";
                echo("");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                echo("");
            }
        }

        function deleteTicket($connection){
            $delete = "DELETE FROM tickets WHERE ID='0'";
            if ($connection->query($delete) === TRUE) {
                echo "Record deleted successfully  ";
            } else {
                echo "Error deleting record: " . $connection->error;
            }
        }
        
    }






?>