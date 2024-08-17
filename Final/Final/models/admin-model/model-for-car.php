<?php
include_once 'db.php';
function carList()
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from car";
    $result=mysqli_query($con, $sql);
    // Closing database connection
    $con->close();
    if($result)
    {
        return $result;
    }
    else
    {
        return false;
    }
}
function deletecar($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "delete from car where id='$id' ";
    $result=mysqli_query($con, $sql);
    // Closing database connection
    $con->close();
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function blockcar($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update car set status='blocked' where id='$id' ";
    $result=mysqli_query($con, $sql);
    // Closing database connection
    $con->close();
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function unblockcar($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update car set status='active' where id='$id' ";
    $result=mysqli_query($con, $sql);
    // Closing database connection
    $con->close();
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function addcar($name, $cartype, $location, $picture)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "INSERT INTO car (name, cartype, location, picture) 
        VALUES ('{$name}', '{$cartype}', '{$location}', '{$picture}')";
    $result=mysqli_query($con, $sql);
    $last_id = $con->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    // Closing database connection
    $con->close();
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function addPassenger($name, $email, $phone, $address, $password)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "INSERT INTO car (name, email, phone, address, password, type) 
        VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '{$password}', 'passenger')";
    $result=mysqli_query($con, $sql);
    $last_id = $con->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    // Closing database connection
    $con->close();
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>