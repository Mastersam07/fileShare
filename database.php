<?php
	$db=new mysqli("localhost","root","","book");
	if(!$db)
	{
		echo"Database is  Not Connected";
	}

?>