<?php
	session_start();
	include "database.php";
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
       <h3 id="heading">Admin Login Here. </h3>
	    <?php
	if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' AND APASS='{$_POST["apass"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc(); 
				$_SESSION["AID"]=$row["AID"];
				$_SESSION["ANAME"]=$row["ANAME"];
				echo "<script>window.open('admin_home.php','_self')</script>";
			}
			else
			{
				echo"<p class='error'>Invalid User name or Password</p>";
			}
		}
?>
		<div id="center">
		  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		
			<label>Name</label>
			<input type="text" name="aname" required>
				<label>Password</label>
			<input type="password" name="apass" required>
				
			<button type="submit" name="submit">Login Now</button>
		  </form>
		</div>
    </div>
  </div>
  <div id="navigation">
   <?php include "side_nav.php"; ?>
  </div>

  <div id="footer">
		<p>Copy Rights &copy; Software Dev. Group F</p>
  </div>
</div>
</body>
</html>
