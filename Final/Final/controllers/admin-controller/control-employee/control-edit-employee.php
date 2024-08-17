<?php
require_once '../../validation.php';

$name = $email = $phone = $address = $salary = $position = "";
$nameErr = $emailErr = $phoneErr = $addressErr = $salaryErr = $positionErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    // $phone = test_input($_POST["phone"]);
    // $address = test_input($_POST["address"]);
    // $password = test_input($_POST["password"]);
    // $cpassword = test_input($_POST["cpassword"]);
    //Name validation
    if(isset($_POST['edit-name'])){
        $name = test_input($_POST["edit-name"]);
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
    if(isset($_POST['edit-email'])){
        $email = test_input($_POST["edit-email"]);
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
    if(isset($_POST['edit-phone'])){
        $phone=test_input($_POST['edit-phone']);
        if($phone==""){
            $phoneErr="Phone field is requied";
        }
        else if (!ctype_digit($phone)) {
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
    //Salary validation
    if(isset($_POST['edit-salary'])){
        $salary=test_input($_POST['edit-salary']);
        if($salary==""){
            $salaryErr="salary field is requied";
        }
        else if (!ctype_digit($salary) ) {
            $salaryErr = "salary can be only numeric.";
        }
    }
    else{
        $salaryErr="salary field is requied";
    }
    //Address validation
    if(isset($_POST['edit-address'])){
        $address=test_input($_POST['edit-address']);
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
    if(isset($_POST['edit-position'])){
        $position=test_input($_POST['edit-position']);
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
    //Inserting database if everything is right
    if($nameErr=="" && $emailErr=="" && $phoneErr=="" && $addressErr=="" && $salaryErr=="" && $positionErr=="")
    {
        echo 'fine';
        include_once('../../../models/admin-model/model-for-employee.php');
        $id=$_POST['edit-id'];
        editEmployee($id, $name, $email, $phone, $address, $salary, $position);
        header('Location: ../../../views/admin/manage-employee');
    }
    else
    {
        echo 'Name error: ',$nameErr,' <br>';
        echo 'Email error: ',$emailErr,' <br>';
        echo 'Phone error: ',$phoneErr,' <br>';
        echo 'Address error: ',$addressErr,' <br>';
        echo 'Salary error: ',$salaryErr,' <br>';
        echo 'Positoin error: ',$positionErr,' <br>';
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
