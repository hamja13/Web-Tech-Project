<?php
$id= $_GET['id'];
include_once('../../../models/admin-model/model-for-car.php');
deletecar($id);
header('Location: ../../../views/admin/manage-car');
?>