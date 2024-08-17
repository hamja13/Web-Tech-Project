<?php
require_once 'validation.php';

// define variables and set to empty values
$name = $email = $phone = $address = $password = $cpassword = "";
$nameErr = $emailErr = $phoneErr = $addressErr = $passwordErr = $cpasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    // $phone = test_input($_POST["phone"]);
    // $address = test_input($_POST["address"]);
    // $password = test_input($_POST["password"]);
    // $cpassword = test_input($_POST["cpassword"]);
    //Name validation
    if(isset($_POST['signup-name'])){
        $name = test_input($_POST["signup-name"]);
        if($name==""){
            $nameErr="Name field is required";
        }
        elseif (!isValidName($name))
        {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }
    else{
        $nameErr="Name field is required";
    }
    //Email validation
    if(isset($_POST['signup-email'])){
        $email = test_input($_POST["signup-email"]);
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
    if(isset($_POST['signup-phone'])){
        $phone=test_input($_POST['signup-phone']);
        if($phone==""){
            $phoneErr="Phone field is requied";
        }
        else if (!ctype_digit($phone) ) {
            $phoneErr = "Phone can be only numeric.";
        }
        //check mobile no length should not be less and greator than 11
        else if (strlen ($phone) != 11)
        {
            $phoneErr = "Phone must contain 11 digits.";
        }
    }
    else{
        $phoneErr="Phone field is requied";
    }
    //Address validation
    if(isset($_POST['signup-address'])){
        $address=test_input($_POST['signup-address']);
        if($address==""){
            $addressErr="Address field is required";
        }
        else if (strlen ($address) < 5){
            $addressErr = "Address must contain at least 5 chars.";
        }
    }
    else{
        $addressErr="Address field is required";
    }
    //Password validatoin
    if(isset($_POST['signup-password'])){
        $password=test_input($_POST['signup-password']);
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
    if(isset($_POST['signup-cpassword'])){
        $cpassword=test_input($_POST['signup-cpassword']);
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
    if($nameErr=="" && $emailErr=="" && $phoneErr=="" && $addressErr=="" && $passwordErr=="" && $cpasswordErr=="")
    {
        echo 'fine';
        include_once('../models/main-model.php');
        passengerRegistration($name, $email, $phone, $address, $password);
    }
    else
    {
        echo 'Name error: ',$nameErr,' <br>';
        echo 'Email error: ',$emailErr,' <br>';
        echo 'Phone error: ',$phoneErr,' <br>';
        echo 'Address error: ',$addressErr,' <br>';
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
