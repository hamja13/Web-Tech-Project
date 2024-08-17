<html>
<head>
</head>
<body>
    <center>
        <?php 
        include_once 'admin-header.php'; 
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
        <form action="../../controllers/admin-controller/control-edit-profile.php" method="post">
            <label for="edit-name">Name: </label><input type="text" name="edit-name" value="<?php echo $row['name'] ?>"><br>
            <label for="edit-email">Email: </label><input type="email" name="edit-email" value="<?php echo $row['email'] ?>"><br>
            <label for="edit-phone">Phone: </label><input type="text" name="edit-phone" value="<?php echo $row['phone'] ?>"><br>
            <label for="edit-address">Address: </label><input type="text" name="edit-address" value="<?php echo $row['address'] ?>"><br>
            <button type="submit">edit</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>