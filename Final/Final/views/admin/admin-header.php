<h1>
    <?php
    if(!isset($loc))
    {
        $loc="";
    }
    ?>
    Admin Panel |
    <a href="<?php echo $loc; ?>../logout.php">Logout</a><br><br>
    <a href="see-profile.php"> Admin Profile</a>|
    <a href="<?php echo $loc; ?>change-password.php">Change Password</a><br><br>
    <a href="<?php echo $loc; ?>manage-employee">Manage Employee</a>|
    <a href="<?php echo $loc; ?>manage-car">Manage Car</a>|
    <a href="<?php echo $loc; ?>manage-driver">Manage Driver</a>|
    <a href="">Manage Voucher</a>
</h1>
<link rel="stylesheet" type="text/css" href="../CSS/admin-header.css">
