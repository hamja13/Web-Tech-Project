<?php

require_once '../../validation.php';

$name = $email = $phone = $address = $salary = $position = $password = $cpassword = "";
$nameErr = $emailErr = $phoneErr = $addressErr = $salaryErr = $positionErr =  $passwordErr = $cpasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    // $phone = test_input($_POST["phone"]);
    // $address = test_input($_POST["address"]);
    // $password = test_input($_POST["password"]);
    // $cpassword = test_input($_POST["cpassword"]);
    //Name validation
    if(isset($_POST['add-name'])){
        $name = test_input($_POST["add-name"]);
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
    if(isset($_POST['add-email'])){
        $email = test_input($_POST["add-email"]);
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
    if(isset($_POST['add-phone'])){
        $phone=test_input($_POST['add-phone']);
        if($phone==""){
            $phoneErr="Phone field is requied";
        }
        else if (!isValidPhoneNumber($phone)) {
            $phoneErr = "Phone can be only numeric.";
        }
        else if (strlen ($phone) != 11) {
            $phoneErr = "Phone must contain 11 digits.";
        }
    }
    else{
        $phoneErr="Phone field is requied";
    }
    //Salary validation
    if(isset($_POST['add-salary'])){
        $salary=test_input($_POST['add-salary']);
        if($salary==""){
            $salaryErr="salary field is requied";
        }
        else if (!ctype_digit($salary)) {
            $salaryErr = "salary can be only numeric.";
        }
    }
    else{
        $salaryErr="salary field is requied";
    }
    //Address validation
    if(isset($_POST['add-address'])){
        $address=test_input($_POST['add-address']);
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
    //Position validation
    if(isset($_POST['add-position'])){
        $position=test_input($_POST['add-position']);
        if($position==""){
            $positionErr="position field is required";
        }
        else if (strlen ($position) < 5){
            $positionErr = "position must contain at least 5 chars.";
        }
    }
    else{
        $positionErr="position field is required";
    }
    //Password validatoin
    if(isset($_POST['add-password'])){
        $password=test_input($_POST['add-password']);
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
    if(isset($_POST['add-cpassword'])){
        $cpassword=test_input($_POST['add-cpassword']);
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
        include_once('../../../models/admin-model/model-for-driver.php');
        addDriver($name, $email, $phone, $address, $password);
        header('Location: ../../../views/admin/manage-driver');
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
    header("Location: ../../views/home.php");
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>