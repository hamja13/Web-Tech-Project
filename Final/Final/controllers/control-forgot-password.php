<?php
require_once 'validation.php';

// define variables and set to empty values
$email = $phone = $password = $cpassword =  $usertype = "";
$emailErr = $phoneErr = $passwordErr = $cpasswordErr = $usertypeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Email validation
    if(isset($_POST['fp-email'])){
        $email = test_input($_POST["fp-email"]);
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
    //Phone validation
    if(isset($_POST['fp-phone'])){
        $phone=test_input($_POST['fp-phone']);
        if($phone==""){
            $phoneErr="Phone field is requied";
        }
    }
    else{
        $phoneErr="Phone field is requied";
    }
    //Login as validation
    if(isset($_POST['fp-usertype'])){
        $usertype = test_input($_POST["fp-usertype"]);
        if($usertype==""){
            $usertypeErr="Usertype field should be checked";
        }
        else if($usertype=="admin" || $usertype=="employee" || $usertype=="passenger")
        {
            $usertypeErr="";
        }
        else
        {
            $usertypeErr="Usertype field should be admin or employee or passenger";
        }
    }
    else{
        $usertypeErr="Usertype field should be checked";
    }
    //Password validatoin
    if(isset($_POST['fp-password'])){
        $password=test_input($_POST['fp-password']);
        if($password==""){
            $passwordErr="Password field is requied";
        }
        else if (strlen ($password) < 8){
            $passwordErr = "Password must contain at least 8 digits.";
        }
    }
    else{
        $passwordErr="Password field is requied";
    }
    //Confirm password validation
    if(isset($_POST['fp-cpassword'])){
        $cpassword=test_input($_POST['fp-cpassword']);
        if($cpassword==""){
            $cpasswordErr="Password confirmation is requied";
        }
    }
    else{
        $cpasswordErr="Password confirmation is requied";
    }
    if($passwordErr=="" && $cpasswordErr==""){
        if($password != $cpassword){
            $cpasswordErr="Password does not match.";
        }
    }
    //Inserting database if everything is right
    if($emailErr=="" && $phoneErr=="" && $passwordErr=="" && $cpasswordErr=="" && $usertypeErr=="")
    {
        if($usertype=='admin')
        {
            include_once '../models/admin-model/profile-model.php';
            echo 'fine';
            if(forgot_and_reset_password($email, $phone, $password)){
                header('Location: ../views');
            }
            else{
                echo "Invalid Email and/or Phone";
            }
        }
        if($usertype=='employee')
        {
            include_once '../models/employee-model/profile-model.php';
            echo 'fine';
            if(forgot_and_reset_password($email, $phone, $password)){
                header('Location: ../views');
            }
            else{
                echo "Invalid Email and/or Phone";
            }
        }
        if($usertype=='passenger')
        {
            include_once '../models/passenger-model/profile-model.php';
            echo 'fine';
            if(forgot_and_reset_password($email, $phone, $password)){
                header('Location: ../views');
            }
            else{
                echo "Invalid Email and/or Phone";
            }
        }

    }
    else
    {
        echo 'Email error: ',$emailErr,' <br>';
        echo 'Phone error: ',$phoneErr,' <br>';
        echo 'Usertype error: ',$usertypeErr,' <br>';
        echo 'Password error: ',$passwordErr,' <br>';
        echo 'Confirm Password error: ',$cpasswordErr,' <br>';
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
