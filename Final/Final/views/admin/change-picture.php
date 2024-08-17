<html>
<head>
    <title>CRMS: change Profile Picture</title>
</head>
<body>
    <center>
        <?php 
        include_once 'admin-header.php';
        ?>
        <?php
        // include_once('../../models/admin-model/profile-model.php');
        if(!isset($_SESSION))
        {
            session_start();
        }
        $picture=$_SESSION['picture'];
        ?>
        <h1>Old Image</h1>
        
        <img src="profile-picture/<?php echo $picture;?>" alt="" height="100px" width="100px" ><br><br>

        <h1>Change Profile Picture</h1>
        <form action="../../controllers/admin-controller/control-change-picture.php" method="post" enctype="multipart/form-data">
            <label for="change-picture">Upload: <input type="file" name="change-picture" id="change-picture">
            <button type="submit" name="submit">change</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>