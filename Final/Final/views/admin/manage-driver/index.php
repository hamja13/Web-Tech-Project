<?php
?>
<html>
<head>
    <title>Managing Driver</title>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <h1>
            <a href="add-driver.php">Add A driver</a>
        </h1>
        <?php
        include_once('../../../models/admin-model/model-for-driver.php');
        $result=driverList();
        ?>
        <table border="2px">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th colspan="3">Action</th>
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
                <td><?php echo $row['status'];?></td>
                <td><a href="../../../controllers/admin-controller/control-driver/control-delete-driver.php?id=<?php echo $row['id'];?>">Delete</a></td>
                <td><a href="../../../controllers/admin-controller/control-driver/control-block-driver.php?id=<?php echo $row['id'];?>">Block</a></td>
                <td><a href="../../../controllers/admin-controller/control-driver/control-unblock-driver.php?id=<?php echo $row['id'];?>">Unblock</a></td>
                <td><a href="edit-driver.php?id=<?php echo $row['id'];?>">Edit</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </center>
    <link rel="stylesheet" type="text/css" href="../../CSS/manage-driver.css">
</body>
</html>