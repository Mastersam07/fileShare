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
      <h3 id="heading">Upload Book Details.</h3>
		<div id="center">
		<?php
	if(isset($_POST["submit"]))
		{
			$bname=$_POST["bname"];
			$keys=$_POST["keys"];
			$target_dir = "upload/";
			$target_file = $target_dir . basename($_FILES["efile"]["name"]);
			if (move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file))
			{
				$sql="INSERT INTO book(BTITLE,KEYWORDS,FILE)
					 VALUES ('{$bname}','{$keys}','{$target_file}')";
					 $db->query($sql);
					 echo "<p class='success'>Adding Book Success.</p>";
			}
					
			else
			{
				echo "<p class='error'>Sorry, there was an error uploading your file.</p>";
			}
	
		}
?>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
		<label>Book Title</label>
		<input type="text" name="bname" required>
		<label>Keywords</label>
		<textarea name="keys" required></textarea>
		<label>Upload File</label>
		<input type="file" name="efile" required>
		
		<button type="submit" name="submit">Save Details</button>
	  </form>
		</div>
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
