<?php
    //Development connection
    // $connect = mysqli_connect("localhost", "root", "", "voting system") or die("connection failed!");
    //("hostname", "database_username", "password", "database_name")
    
    //Deployment connection
    $connect = mysqli_connect("remotemysql.com", "CD0AG1JYUM", "JaMPcA0qzb", "CD0AG1JYUM") or die("connection failed!");

?>
