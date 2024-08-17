<?php
// define variables and set to empty values
$password = $cpassword = "";
$passwordErr = $cpasswordErr = "";
include_once '../../models/admin-model/profile-model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Password validatoin
    if(isset($_POST['change-password'])){
        $password=test_input($_POST['change-password']);
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
    if(isset($_POST['change-cpassword'])){
        $cpassword=test_input($_POST['change-cpassword']);
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
    if($passwordErr=="" && $cpasswordErr=="")
    {
        echo 'fine';
        session_start();
        $id=$_SESSION['id'];
        if(change_password($id, $password)){
             header('Location: ../../views/admin');
            echo "fine 2: ".$id;
        }
    }
    else
    {
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