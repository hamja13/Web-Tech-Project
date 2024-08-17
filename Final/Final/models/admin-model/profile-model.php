<?php
include_once 'db.php';
function getProfile($id)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "select * from admin where id='$id' ";
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
function editProfile($id, $name, $email, $phone, $address)
{
    // Connecting to database
    $con = getconnection();
    // Inserting data into login table
    $sql= "update admin set name='$name', email='$email', phone='$phone', address='$address' where id='$id' ";
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
function login($email, $password)
    {
        $conn = getconnection();
        $sql = "select * from admin where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        // $count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
        return $result;
        // if($count == 1)
        // {
        //     $row = $result->fetch_assoc();
        //     return $row["type"];
        // }else
        // {
        //     return false;
        // }
    }
    function change_password($id, $new_password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE admin SET password = '{$new_password}' WHERE id='{$id}'";
        echo $sql. "<br>";
        $result=mysqli_query($con, $sql);
        $row_affected = $con->affected_rows;
        // Closing database connection
        $con->close();
		if($result && $row_affected==1)
        {
			return true;
		}
        else
        {
			return false;
		}
    }
    function change_picture($id, $new_picture)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE admin SET picture = '{$new_picture}' WHERE id='{$id}'";
        echo $sql. "<br>";
        $result=mysqli_query($con, $sql);
        $row_affected = $con->affected_rows;
        // Closing database connection
        $con->close();
		if($result && $row_affected==1)
        {
			return true;
		}
        else
        {
			return false;
		}
    }
    function forgot_and_reset_password($email, $phone, $password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE admin SET password = '{$password}' 
                WHERE email = '{$email}' and phone = '{$phone}'";
        echo $sql. "<br>";
        $result=mysqli_query($con, $sql);
        $row_affected = $con->affected_rows;
        
        // Closing database connection
        $con->close();
		if($result && $row_affected==1)
        {
			return true;
		}
        else
        {
			return false;
		}
    }