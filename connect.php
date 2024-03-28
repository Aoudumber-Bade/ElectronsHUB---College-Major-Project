<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "products_reviews_db"; 

    $conn = mysqli_connect($servername,$username,$pass,$dbname);

    if($conn){
        echo "Database Connection Established";
    }
    else {
        echo "failed to connect the database";
    }
?>