<?php
?>
<html>
<head>
    <title>editing an driver</title>
    <style>
        label{
            display: inline-block;
            width: 150px;
        }
        input{
            width: 200px;
        }
    </style>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <?php
        include_once('../../../models/admin-model/model-for-driver.php');
        $row=onedriverDetail($_GET['id']);
        ?>
        <form action="../../../controllers/admin-controller/control-driver/control-edit-driver.php" method="POST">
            <h3>ID: <?php echo $_GET['id'];?></h3>
            <label for="edit-id">ID: </label><input type="text" name="edit-id" value="<?php echo $row['id'];?>" readonly><br>
            <label for="edit-name">Name: </label><input type="text" name="edit-name" value="<?php echo $row['name'];?>"><br>
            <label for="edit-email">Email: </label><input type="email" name="edit-email" value="<?php echo $row['email'];?>"><br>
            <label for="edit-phone">Phone: </label><input type="text" name="edit-phone" value="<?php echo $row['phone'];?>"><br>
            <label for="edit-address">address: </label><input type="text" name="edit-address" value="<?php echo $row['address'];?>"><br>
            <!-- <label for="edit-salary">Salary: </label><input type="text" name="edit-salary"><br> -->
            <button type="submit">edit</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>