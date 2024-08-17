<?php
    require_once 'db.php';
    // Add driver ID method
    function driverRegistration($name, $email, $phone, $address, $password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "INSERT INTO driver (name, email, phone, address, password) 
            VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '{$password}')";
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
    function change_password($id, $new_password)
    {
        // Connecting to database
        $con = getconnection();
        // Inserting data into login table
        $sql= "UPDATE users SET password = '{$new_password}' WHERE id='{$id}'";
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
        $sql= "UPDATE users SET password = '{$password}' 
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
    function login($email, $password)
    {
        $conn = getconnection();
        $sql = "select * from users where email='{$email}' and password='{$password}'";
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
    function getProfileDetails($userid)
    {
        $conn = getconnection();
        $sql = "select * from users where userid='{$userid}'";
        $result = mysqli_query($conn, $sql);
        //$count = mysqli_num_rows($result);
        // Closing database connection
        $conn->close();
        return $result;
    }

?>