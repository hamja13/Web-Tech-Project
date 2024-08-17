<?php
?>
<html>
<head>
    <title>Managing Employee</title>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <h1>
            <a href="add-employee.php">Add an employee</a>
        </h1>
        <?php
        include_once('../../../models/admin-model/model-for-employee.php');
        $result=employeeList();
        ?>
        <table border="2px">
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Position</th>
                <th>Status</th>
                <th colspan="4">Action</th>
            </tr>
        <?php
        while($row = $result->fetch_assoc())
        {
            ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['salary'];?></td>
                <td><?php echo $row['position'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><a href="../../../controllers/admin-controller/control-employee/control-delete-employee.php?id=<?php echo $row['id'];?>">Delete</a></td>
                <td><a href="../../../controllers/admin-controller/control-employee/control-block-employee.php?id=<?php echo $row['id'];?>">Block</a></td>
                <td><a href="../../../controllers/admin-controller/control-employee/control-unblock-employee.php?id=<?php echo $row['id'];?>">Unblock</a></td>
                <td><a href="edit-employee.php?id=<?php echo $row['id'];?>">Edit</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </center>
    <link rel="stylesheet" type="text/css" href="../../CSS/manage-employee.css">
</body>
</html>