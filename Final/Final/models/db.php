<?php
    // Get connection method
    function getconnection()
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "lab";
        $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
?>