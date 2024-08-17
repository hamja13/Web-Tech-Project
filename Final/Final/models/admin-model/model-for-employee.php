<?php
include_once 'db.php';
function employeeList()
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from employee";
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
function oneEmployeeDetail($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from employee where id='$id' ";
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
function deleteEmployee($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "delete from employee where id='$id' ";
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
function blockEmployee($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update employee set status='blocked' where id='$id' ";
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
function unblockEmployee($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update employee set status='active' where id='$id' ";
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
function editEmployee($id, $name, $email, $phone, $address, $salary, $position)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update employee set name='{$name}', email='{$email}', phone='{$phone}', 
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
function addEmployee($name, $email, $phone, $address, $salary, $position, $password)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "INSERT INTO employee (name, email, phone, address, salary, position, password) 
        VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '{$salary}', '{$position}', '{$password}')";
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