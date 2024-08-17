<html>
<head>
    <title>rp into CRMS</title>
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
        <?php include_once 'header.php'; ?>
        <form action="../controllers/control-reset-password.php" method="post">
            <label for="rp-old-password">Enter password: </label><input type="password" name="rp-old-password"><br>
            <label for="rp-new-password">Enter password: </label><input type="password" name="rp-new-password"><br>
            <label for="rp-new-cpassword">Confirm password: </label><input type="password" name="rp-new-cpassword"><br>
            <button type="submit">Reset Password</button>|<button type="reset">Clear</button>
        </form>
    </center>
</body>
</html>