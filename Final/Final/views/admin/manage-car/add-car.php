<?php
?>
<html>
<head>
    <title>Adding an Car</title>
    <style>
        label{
            display: inline-block;
            width: 150px;
            text-align: right;
        }
        input{
            width: 200px;
            text-align: left;
        }
        input.radioinput{
            width: auto;
            text-align: right;
        }
        input.radioinput+label{
            width: auto;
        }
    </style>
</head>
<body>
    <center>
        <?php 
        $loc = "../";
        include_once ('../admin-header.php'); 
        ?>
        <form action="../../../controllers/admin-controller/control-car/control-add-car.php" method="POST" enctype="multipart/form-data">
            <label for="add-name">Name: </label><input type="text" name="add-name"><br>
            <label for="add-location">location: </label><input type="text" name="add-location"><br>
            <!-- <label for="add-cartype">cartype: </label><input type="text" name="add-cartype"><br> -->
            Choose Car type <br>
            <input type="radio" class="radioinput" name="add-cartype" id="luxury" value="luxury"><label for="luxury">luxury</label><br>
            <input type="radio" class="radioinput" name="add-cartype" id="micro" value="micro"><label for="micro">Micro</label><br>
            <input type="radio" class="radioinput" name="add-cartype" id="sports" value="sports"><label for="sports">Sports</label><br>
            <input type="radio" class="radioinput" name="add-cartype" id="jeep" value="jeep"><label for="jeep">Jeep</label><br>
            <!-- <label for="add-quantity">quantity: </label><input type="text" name="add-quantity"><br> -->
            <!-- <label for="add-picture">picture: </label><input type="text" name="add-picture"><br> -->
            <label for="add-picture">picture: <input type="file" name="add-picture" id="add-picture">
            <button type="submit">Add</button>|<button type="reset">Clear</button>
        </form>
    </center>
    
</body>
</html>