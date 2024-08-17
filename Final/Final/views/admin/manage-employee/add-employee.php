<?php
?>
<html>
<head>
    <title>Adding an Employee</title>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <form action="../../../controllers/admin-controller/control-employee/control-add-employee.php" method="POST">
            <label for="add-name">Name: </label><input type="text" name="add-name"><br>
            <label for="add-email">Email: </label><input type="email" name="add-email"><br>
            <label for="add-phone">Phone: </label><input type="text" name="add-phone"><br>
            <label for="add-address">Address: </label><input type="text" name="add-address"><br>
            <label for="add-salary">Salary: </label><input type="text" name="add-salary"><br>
            Choose Employee Position <br>
            <input type="radio" class="radioinput" name="add-position" id="junior" value="junior"><label for="junior">Junior</label><br>
            <input type="radio" class="radioinput" name="add-position" id="senior" value="senior"><label for="senior">Senior</label><br>
            <input type="radio" class="radioinput" name="add-position" id="leader" value="leader"><label for="leader">Leader</label><br>
            <!-- <label for="add-position">Position: </label><input type="radio" name="add-position" id=""><br> -->
            <label for="add-password">Enter password: </label><input type="password" name="add-password"><br>
            <label for="add-password">Confirm password: </label><input type="password" name="add-cpassword"><br>
            <button type="submit">Add</button>|<button type="reset">Clear</button>
        </form>
    </center>
    <link rel="stylesheet" type="text/css" href="../../CSS/add-employee.css">

</body>
</html>