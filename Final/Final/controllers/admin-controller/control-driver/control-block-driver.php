<?php
$id= $_GET['id'];
include_once('../../../models/admin-model/model-for-driver.php');
blockdriver($id);
header('Location: ../../../views/admin/manage-driver');
?>