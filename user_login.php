<?php
	include "database.php";
	session_start();
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
      <h3 id="heading">Student Login Here. </h3>
	    <?php
	if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM student WHERE NAME='{$_POST["name"]}' AND PASS='{$_POST["pass"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc(); 
				$_SESSION["ID"]=$row["ID"];
				$_SESSION["NAME"]=$row["NAME"];
				echo "<script>window.open('student_home.php','_self')</script>";
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
				<input type="text" name="name" required>
					<label>Password</label>
				<input type="password" name="pass" required>
					
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
