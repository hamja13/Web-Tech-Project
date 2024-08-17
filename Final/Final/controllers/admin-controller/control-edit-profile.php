<?php
require_once 'validation.php';

// define variables and set to empty values
$name = $email = $phone = $address = "";
$nameErr = $emailErr = $phoneErr = $addressErr = "";

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

    //Inserting database if everything is right
    if($nameErr=="" && $emailErr=="" && $phoneErr=="" && $addressErr=="")
    {
        echo 'fine';
        include_once('../../models/admin-model/profile-model.php');
        session_start();
        $id=$_SESSION['id'];
        if(editProfile($id, $name, $email, $phone, $address))
        {
            header('Location: ../../views/admin');
        }
    }
    else
    {
        echo 'Name error: ',$nameErr,' <br>';
        echo 'Email error: ',$emailErr,' <br>';
        echo 'Phone error: ',$phoneErr,' <br>';
        echo 'Address error: ',$addressErr,' <br>';
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
