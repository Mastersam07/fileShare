<?php
	include "database.php";
	$sql="DELETE from book where BID=".$_GET["id"];
	if($db->query($sql))
	{
		echo "<script>window.open('Admin_view_book.php?mes=Book Details Deleted','_self')</script>";
	}
	else
	{
		echo "<script>window.open('Admin_view_book.php','_self')</script>";
	}
?>
