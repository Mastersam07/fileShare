<?php
	include "database.php";
	session_start();
	unset ($_SESSION["AID"]);
	unset ($_SESSION["ID"]);
	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
?>