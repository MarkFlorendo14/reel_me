<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "social_wall";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    //sanity check if it errors.
    if (!$conn) { 
        die("Could not connect: " . mysqli_connect_error()); 
    }
?>