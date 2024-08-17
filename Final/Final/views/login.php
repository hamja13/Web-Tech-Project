<!DOCTYPE html>
<html>
<head>
    <title>Login into CRMS</title>
    <style>
        label {
            display: inline-block;
            width: 150px;
        }
        input {
            width: 200px;
        }
        input.radio-btn {
            width: auto;
        }
    </style>
    <script src="login.js"></script> <!-- Link to the JavaScript file -->
</head>
<body>
    <center>
        <?php include_once 'header.php'; ?>
        <form action="../controllers/control-login.php" method="post" onsubmit="return validateForm();">
            <label for="login-email">Email: </label><input type="email" name="login-email"><br>

            <label for="login-password">Password: </label><input type="password" name="login-password"><br>
            <span style="color:red"> Login As:</span>

            <label for="login-as-admin">Admin</label><input type="radio" class="radio-btn" name="login-as" value="admin">|
            <label for="login-as-employee">Employee</label><input type="radio" class="radio-btn" name="login-as" value="employee">|
           
            <button type="submit">Login</button>|<button type="reset">Clear</button><br>
            <a href="forgot-password.php">Forgot Password?</a>
        </form>
    </center>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
</body>
</html>
