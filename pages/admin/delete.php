<?php
include('classes/admin/ApproveDeclineOrganization.php');
include('classes/admin/AddDeleteCategory');
if(isset($_GET['id'])){
	
	$id=$_GET['id'];

	$obj=new ApproveDeclineOrganization();
	$obj->deleteOrganization($id);
}

if(isset($_GET['category-id'])){

}

?>