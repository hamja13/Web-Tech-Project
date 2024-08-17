<html>
<head>
    <title>fp into CRMS</title>
    <style>
        label{
            display: inline-block;
            width: 150px;
        }
        input{
            width: 200px;
        }
        input.radio-btn{
            width: auto;
        }
    </style>
</head>
<body>
    <center>
        <?php include_once 'header.php'; ?>
        <form action="../controllers/control-forgot-password.php" method="post">
            <label for="fp-email">Email: </label><input type="email" name="fp-email"><br>
            <label for="fp-phone">Phone: </label><input type="text" name="fp-phone"><br>
            <label for="fp-password">Enter password: </label><input type="password" name="fp-password"><br>
            <label for="fp-password">Confirm password: </label><input type="password" name="fp-cpassword"><br>
            <span style="color:red"> Usertype:</span>
            Admin</label><input type="radio" class="radio-btn" name="fp-usertype" id="" value="admin">|
            Employee<input type="radio" class="radio-btn" name="fp-usertype" id="" value="employee"><br>
            <button type="submit">Reset Password</button>|<button type="reset">Clear</button>
        </form>
    </center>
    <link rel="stylesheet" type="text/css" href="CSS/forgot-password.css">
</body>
</html>