<?php
$id= $_GET['id'];
include_once('../../../models/admin-model/model-for-employee.php');
unblockEmployee($id);
header('Location: ../../../views/admin/manage-employee');
?>