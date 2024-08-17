<?php
include_once 'db.php';
function driverList()
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from driver";
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
function oneDriverDetail($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from driver where id='$id' ";
    $result=mysqli_query($con, $sql);
    // Closing database connection
    $con->close();
    if($result)
    {
        return $result->fetch_assoc();
    }
    else
    {
        return false;
    }
}
function deleteDriver($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "delete from driver where id='$id' ";
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
function blockDriver($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update driver set status='blocked' where id='$id' ";
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
function unblockDriver($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update driver set status='active' where id='$id' ";
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
function editDriver($id, $name, $email, $phone, $address, $salary, $position)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update driver set name='{$name}', email='{$email}', phone='{$phone}', 
        address='{$address}', salary='{$salary}', position='{$position}' where id='$id' ";
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
function addDriver($name, $email, $phone, $address, $password)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "INSERT INTO driver (name, email, phone, address, password) 
        VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '{$password}')";
    echo $sql;
    $result=mysqli_query($con, $sql);
    $last_id = $con->insert_id;
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
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