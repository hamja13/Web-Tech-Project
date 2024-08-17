<?php
$id= $_GET['id'];
include_once('../../../models/admin-model/model-for-employee.php');
blockEmployee($id);
header('Location: ../../../views/admin/manage-employee');
?>