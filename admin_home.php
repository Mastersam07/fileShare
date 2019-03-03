<?php
	include "database.php";
	include "function.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('user_login.php','_self')</script>";
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>File Share</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<div id="container">
<div id="header"><h1><a href="index.php">FileShare</a></h1></div>
  <div id="wrapper">
    <div id="content">
      <p id="heading"> Welcome <?php echo $_SESSION["ANAME"]; ?>.</p>
		<ul id="count">
			<li>Total Students : <?php echo countRecord("SELECT * from student",$db); ?></li>
			<li>Total Books    : <?php echo countRecord("SELECT * from book",$db); ?></li>
			<li>Total Request  : <?php echo countRecord("SELECT * from request",$db); ?></li>
			<li>Total Comments : <?php echo countRecord("SELECT * from comment",$db); ?></li>
		</ul>
    </div>
  </div>
  <div id="navigation">
   <?php include "admin_side_nav.php"; ?>
  </div>
  <div id="footer">
		<p>Copy Rights &copy; Software Dev. Group F</p>
  </div>
</div>
</body>
</html>
