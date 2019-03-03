<?php
	include "database.php";
	session_start();
if(!isset($_SESSION["ID"]))
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
      <h3 id="heading">Welcome <?php echo $_SESSION["NAME"]; ?>.</h3>
	
    </div>
  </div>
  <div id="navigation">
   <?php include "user_side_nav.php"; ?>
  </div>

  <div id="footer">
    <p>Copy Rights &copy; Software Dev. Group F</p>
  </div>
</div>
</body>
</html>
