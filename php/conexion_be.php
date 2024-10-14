<?php 

    $conexion=mysqli_connect("localhost", "root", "", "login");
    
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>