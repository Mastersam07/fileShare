<?php
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
      <h3 id="heading">Register Here</h3>
	    <?php
	if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$pass=$_POST["pass"];
			$mail=$_POST["mail"];
			$dep=$_POST["dep"];
		
		 $sql="INSERT INTO student(NAME,PASS,MAIL,DEP)
		 VALUES ('{$name}','{$pass}','{$mail}','{$dep}')";
					
			 if($db->query($sql))
			{
				echo "<p class='success'>User Registration Success.</p>";
			}
			else
			{
				echo "<p class='success'>Registration Failed.</p>";
			}

		}
?>
	<div id="center">
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	
		<label>Name</label>
		<input type="text" name="name" required>
			<label>Password</label>
		<input type="password" name="pass" required>
			<label>E - Mail</label>
		<input type="email" name="mail" required>
			<label>Department</label>
		<select name="dep" required>
			<option value="">Select</option>
			<option value="BCA">BCA</option>
			<option value="B.SC CS">B.SC CS</option>
			<option value="B.SC MATHS">B.SC MATHS</option>
		</select>
		<button type="submit" name="submit">Save Details</button>
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
