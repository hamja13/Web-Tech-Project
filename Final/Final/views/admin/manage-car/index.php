<html>
<head>
    <title>Managing Car</title>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <h1>
            Managing Car
        </h1>
        <h1>
            <a href="add-car.php">Add a Car</a>
        </h1>
        <?php
        include_once('../../../models/admin-model/model-for-car.php');
        $result=carList();
        ?>
        <table border="2px">
            <tr>
                <th>Location</th>
                <th>Car Type</th>
                <th>Car Name</th>
                <th>Picture</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        <?php
        while($row = $result->fetch_assoc())
        {
            ?>
            <tr>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['cartype'];?></td>
                <td><?php echo $row['name'];?></td>
                <td>
                    <!--car locatin-->
                    <a href="<?php echo "../../caruploads/".$row['picture'];?>" target="_blank">
                        <img src="<?php echo "../../caruploads/".$row['picture'];?>" alt="" height="100px" width="100px">
                    </a>
                </td>
                <td><?php echo $row['status'];?></td>
                <td><a href="../../../controllers/admin-controller/control-car/control-delete-car.php?id=<?php echo $row['id'];?>">Delete</a></td>
                <td><a href="../../../controllers/admin-controller/control-car/control-block-car.php?id=<?php echo $row['id'];?>">Block</a></td>
                <td><a href="../../../controllers/admin-controller/control-car/control-unblock-car.php?id=<?php echo $row['id'];?>">Unblock</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </center>
</body>
</html>