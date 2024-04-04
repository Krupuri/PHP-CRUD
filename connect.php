<?php
    $connect = mysqli_connect('localhost', 'root', '', 'employeedb');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
