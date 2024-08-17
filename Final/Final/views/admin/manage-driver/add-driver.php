<?php
?>
<html>
<head>
    <title>Adding a Driver</title>
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
        <form action="../../../controllers/admin-controller/control-driver/control-add-driver.php" method="POST">
            <label for="add-name">Name: </label><input type="text" name="add-name"><br>
            <label for="add-email">Email: </label><input type="email" name="add-email"><br>
            <label for="add-phone">Phone: </label><input type="text" name="add-phone"><br>
            <label for="add-address">Address: </label><input type="text" name="add-address"><br>
            <!-- <label for="add-salary">Salary: </label><input type="text" name="add-salary"><br> -->
            <label for="add-password">Enter password: </label><input type="password" name="add-password"><br>
            <label for="add-password">Confirm password: </label><input type="password" name="add-cpassword"><br>
            <button type="submit">Add</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>