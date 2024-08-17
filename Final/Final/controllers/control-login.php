<?php
require_once 'validation.php';

// define variables and set to empty values
$email = $password = $login_as = "";
$emailErr = $passwordErr = $login_asErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Email validation
    if(isset($_POST['login-email'])){
        $email = test_input($_POST["login-email"]);
        if($email==""){
            $emailErr="Email field is required";
        }
        elseif(!isValidEmail($email)){
            $emailErr = "Email address should be valid";
        }
    }
    else{
        $emailErr="Email field is required";
    }
    //Login as validation
    if(isset($_POST['login-as'])){
        $login_as = test_input($_POST["login-as"]);
        if($login_as==""){
            $login_asErr="Login-as field should be checked";
        }
        else if($login_as=="admin" || $login_as=="employee" || $login_as=="passenger")
        {
            $login_asErr="";
        }
        else
        {
            $login_asErr="Login as field should be admin or employee or passenger";
        }
    }
    else{
        $login_asErr="Login-as field should be checked";
    }

    //Password validatoin
    if(isset($_POST['login-password'])){
        $password=test_input($_POST['login-password']);
        if($password==""){
            $passwordErr="Password field is requied";
        }
    }
    else{
        $passwordErr="Password field is requied";
    }
    //Inserting database if everything is right
    if($emailErr=="" && $passwordErr=="" && $login_asErr=="")
    {
        if($login_as=="admin")
        {
            include_once '../models/admin-model/profile-model.php';
            $result = login($email, $password);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['email']=$email;
                $_SESSION['type']=='admin';
                header('Location: ../views/admin');
            }
            else{
                echo "invalid credential";
                echo $email. " ". $password;
            }
        }
        if($login_as=="admin")
        {
            include_once '../models/admin-model/profile-model.php';
            $result = login($email, $password);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['picture']=$row['picture'];
                $_SESSION['email']=$email;
                $_SESSION['type']=='admin';
                header('Location: ../views/admin');
            }
            else{
                echo "invalid credential";
                echo $email. " ". $password;
            }
        }
        if($login_as=="employee")
        {
            include_once '../models/employee-model/profile-model.php';
            $result = login($email, $password);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['picture']=$row['picture'];
                $_SESSION['email']=$email;
                $_SESSION['type']=='employee';
                header('Location: ../views/employee');
            }
            else{
                echo "invalid credential";
                echo $email. " ". $password;
            }
        }
        if($login_as=="passenger")
        {
            include_once '../models/passenger-model/profile-model.php';
            $result = login($email, $password);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['picture']=$row['picture'];
                $_SESSION['email']=$email;
                $_SESSION['type']=='passenger';
                header('Location: ../views/passenger');
            }
            else{
                echo "invalid credential";
                echo $email. " ". $password;
            }
        }
    }
    else
    {
        echo 'Email error: ',$emailErr,' <br>';
        echo 'Password error: ',$passwordErr,' <br>';
        echo 'Login as error: ',$login_asErr,' <br>';
    }
}
else{
    header("Location: ../views/home.php");
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
