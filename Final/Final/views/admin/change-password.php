<html>
<head>
<title></title>
</head>
<body>
    <center>
        <?php 
        include_once 'admin-header.php'; 
        ?>
        <h1>Change Password</h1>
        <form action="../../controllers/admin-controller/control-change-password.php" method="post">
            <label for="change-password">Enter password: </label><input type="password" name="change-password"><br>
            <label for="change-password">Confirm password: </label><input type="password" name="change-cpassword"><br>
            <button type="submit">Change Password</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>