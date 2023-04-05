<?php 
    $Host = 'localhost';
    $User = 'root';
    $Pass = '';
    $dbName = "transupn";
    
    $conn = mysqli_connect($Host, $User, $Pass, $dbName);
    
    mysqli_select_db($conn,$dbName);
?>