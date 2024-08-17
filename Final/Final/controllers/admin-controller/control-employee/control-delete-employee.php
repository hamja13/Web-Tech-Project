<?php
$id= $_GET['id'];
include_once('../../../models/admin-model/model-for-employee.php');
deleteEmployee($id);
header('Location: ../../../views/admin/manage-employee');
?>