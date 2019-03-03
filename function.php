<?php
	include "database.php";
	function countRecord($sql,$db)
	{
		$res=$db->query($sql);
		return $res->num_rows;
	}
	
	function viewRecords($sql,$db)
	{
	}
?>
