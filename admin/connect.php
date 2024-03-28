<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ElectronsHUB";
        

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if($conn){
 
        }else{
            echo "Connection Failed" .mysqli_connect_error();
        }

?>
