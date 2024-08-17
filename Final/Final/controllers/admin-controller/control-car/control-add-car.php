<?php
// define variables and set to empty values
$location = $cartype = $name = $picture = "";
$locationErr = $cartypeErr = $nameErr = $pictureErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //location validation
    if(isset($_POST['add-location'])){
        $location = test_input($_POST["add-location"]);
        if($location==""){
            $locationErr="location field is required";
        }
    }
    else{
        $locationErr="location field is required";
    }
    //Name validation
    if(isset($_POST['add-name'])){
        $name = test_input($_POST["add-name"]);
        if($name==""){
            $nameErr="Name field is required";
        }
    }
    else{
        $nameErr="Name field is required";
    }
    //cartype validation
    if(isset($_POST['add-cartype'])){
        $cartype = test_input($_POST["add-cartype"]);
        if($cartype==""){
            $cartypeErr="cartype field is required";
        }
    }
    else{
        $cartypeErr="cartype field is required";
    }
    //quantity validation
    // if(isset($_POST['add-quantity'])){
    //     $quantity=test_input($_POST['add-quantity']);
    //     if($quantity==""){
    //         $quantityErr="quantity field is requied";
    //     }
    //     else if (!preg_match ("/^[0-9]*$/", $quantity) ) {  
    //         $quantityErr = "quantity can be only numeric.";  
    //     }  
    // }
    // else{
    //     $quantityErr="quantity field is requied";
    // }





    $target_dir = "../../../views/caruploads/";
    $picture = microtime(true). basename($_FILES["add-picture"]["name"]);
    $target_file = $target_dir .$picture;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["add-profile"])) {
        $check = getimagesize($_FILES["add-picture"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
            $pictureErr= "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check file size
      if ($_FILES["add-picture"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $pictureErr= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $pictureErr= "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["add-picture"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["add-picture"]["name"])). " has been uploaded.";
        } else {
            $pictureErr= "Sorry, there was an error uploading your file.";
        }
      }


    //Inserting database if everything is right
    if($nameErr=="" && $cartypeErr=="" && $locationErr=="" && $pictureErr=="")
    {
        echo 'fine';
         include_once('../../../models/admin-model/model-for-car.php');
         addcar($name, $cartype, $location, $picture);
         header('Location: ../../../views/admin/manage-car');
    }
    else
    {
        echo 'Locatoin error: ',$locationErr,' <br>';
        echo 'Car Type error: ',$cartypeErr,' <br>';
        echo 'Name error: ',$nameErr,' <br>';
        echo 'Picture error: ',$pictureErr,' <br>';
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