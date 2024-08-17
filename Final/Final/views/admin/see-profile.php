<?php
?>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <center>
        <?php 
        // $loc = "../";
        include_once ('admin-header.php'); 
        ?>
        <?php
        include_once('../../models/admin-model/profile-model.php');
        if(!isset($_SESSION))
        {
            session_start();
        }
        $id=$_SESSION['id'];
        $result=getProfile($id);
        $row=$result->fetch_assoc();
        ?>
            <img src="profile-picture/<?php echo $row['picture'];?>" alt="" height="100px" width="100px"><br>
            <h2><a href="change-picture.php">Change Profile Picture</a></h2>
            <h1>ID: <?php echo $id;?></h1>
            <h2><a href="edit-profile.php">Edit Profile</a></h2>
    </center>
</body>
</html>