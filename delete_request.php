<?php
	include "database.php";
	$sql="DELETE from request where ID=".$_GET["id"];
	if($db->query($sql))
	{
		echo "<script>window.open('admin_view_req.php?mes=Request Deleted','_self')</script>";
	}
	else
	{
		echo "<script>window.open('admin_view_req.php','_self')</script>";
	}
?>
