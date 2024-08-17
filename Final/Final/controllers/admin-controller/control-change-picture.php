<?php
// define variables and set to empty values
$location = $cartype = $name = $picture = "";
$locationErr = $cartypeErr = $nameErr = $pictureErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $target_dir = "../../views/admin/profile-picture/";
    $picture = microtime(true). basename($_FILES["change-picture"]["name"]);
    $target_file = $target_dir .$picture;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // if(isset($_FILES["change-picture"])) {
    //     $check = getimagesize($_FILES["change-picture"]["tmp_name"]);
    //     if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //       $uploadOk = 1;
    //     } else {
    //         $pictureErr= "File is not an image.";
    //       $uploadOk = 0;
    //     }
    //   }
      
      // Check file size
      if ($_FILES["change-picture"]["size"] > 50000000) {
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
        if (move_uploaded_file($_FILES["change-picture"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["change-picture"]["name"])). " has been uploaded.";
        } else {
            $pictureErr= "Sorry, there was an error uploading your file.";
        }
      }


    //Inserting database if everything is right
    if($pictureErr=="")
    {
        echo 'fine';
         include_once('../../models/admin-model/profile-model.php');
         session_start();
         $id=$_SESSION['id'];
         $_SESSION['picture']=$picture;
         change_picture($id, $picture);
         header('Location: ../../views/admin');
    }
    else
    {
        echo 'Picture error: ',$pictureErr,' <br>';
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