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
      <h3 id="heading">Change Password</h3>
		<div id="center">
	<?php
	if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM student WHERE PASS='{$_POST["opass"]}' and ID=".$_SESSION["ID"];
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
				$db->query($s);
				echo "<p class='success'>Password Changed</p>";
			}
			else
			{
				echo "<p class='error'>Invalid Password</p>";
			}

		}
	?>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<label>Old Password</label>
			<input type="password" name="opass" required>
			<label>New Password</label>
			<input type="password" name="npass" required>
			<button type="submit" name="submit">Update Now</button>
			</form>
		</div>
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
