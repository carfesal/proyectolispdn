<?php
    $servername = "db4free.net";
    $username = "lisceva";
    $password = "liscevallos";
    $database = "proyectolis";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>