<?php
?>
<html>
<head>
    <title>editing an Employee</title>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <?php
        include_once('../../../models/admin-model/model-for-employee.php');
        $row=oneEmployeeDetail($_GET['id']);
        ?>
        <form action="../../../controllers/admin-controller/control-employee/control-edit-employee.php" method="POST">
            <h3>ID: <?php echo $_GET['id'];?></h3>
            <label for="edit-id">ID: </label><input type="text" name="edit-id" value="<?php echo $row['id'];?>" readonly><br>
            <label for="edit-name">Name: </label><input type="text" name="edit-name" value="<?php echo $row['name'];?>"><br>
            <label for="edit-email">Email: </label><input type="email" name="edit-email" value="<?php echo $row['email'];?>"><br>
            <label for="edit-phone">Phone: </label><input type="text" name="edit-phone" value="<?php echo $row['phone'];?>"><br>
            <label for="edit-address">address: </label><input type="text" name="edit-address" value="<?php echo $row['address'];?>"><br>

            <label for="edit-salary">Salary: </label><input type="text" name="edit-salary" value="<?php echo $row['salary'];?>"><br>
            Choose Employee Position <br>
            <input type="radio" class="radioinput" name="edit-position" id="junior" value="junior" <?php if($row['position']=='junior') echo 'checked';?>>
            <label for="junior" >Junior</label><br>
            <input type="radio" class="radioinput" name="edit-position" id="senior" value="senior" <?php if($row['position']=='senior') echo 'checked';?>>
            <label for="senior">Senior</label><br>
            <input type="radio" class="radioinput" name="edit-position" id="leader" value="leader" <?php if($row['position']=='leader') echo 'checked';?>>
            <label for="leader">Leader</label><br>
            <!-- <label for="edit-salary">Salary: </label><input type="text" name="edit-salary"><br> -->
            <button type="submit">edit</button>|<button type="reset">Clear</button>
        </form>
    </center>
    <link rel="stylesheet" type="text/css" href="../../CSS/edit-employee.css">
</body>
</html>