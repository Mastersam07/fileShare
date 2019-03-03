<?php
	include "database.php";
	$sql="DELETE from student where ID=".$_GET["id"];
	if($db->query($sql))
	{
		echo "<script>window.open('admin_view_stud.php?mes=Student removed!','_self')</script>";
	}
	else
	{
		echo "<script>window.open('admin_view_stud.php','_self')</script>";
	}
?>
