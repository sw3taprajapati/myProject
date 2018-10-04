<?php

include('classes/admin/ApproveDeclineOrganization.php');

$id=$_GET['id'];

$obj=new ApproveDeclineOrganization();
$obj->approveOrganization($id);
?>