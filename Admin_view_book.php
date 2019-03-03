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
      <h3 id="heading">View Book Details.</h3>
	<?php 
	if(isset($_GET["mes"]))
	{
		echo "<p class='success'>".$_GET["mes"]."</p>";
	}
		$sql="SELECT * FROM book";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			echo "<table>";
					echo "<tr>";
						echo "<th>SNO</th>";
						echo "<th>TITLE</th>";
						echo "<th>KEYWORDS</th>";
						echo "<th>VIEW</th>";
						echo "<th>DELETE</th>";
					echo "</tr>";
					$i=0;
				while($row=$res->fetch_assoc())
				{
					$i++;
					echo "<tr>";
					echo "<td>{$i}</td>";
					echo "<td>{$row["BTITLE"]}</td>";
					echo "<td>{$row["KEYWORDS"]}</td>";
					echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
					echo "<td><a href='delete_book.php?id={$row["BID"]}'>Delete</a></td>";
					echo "</tr>";
				}
			echo "</table>";
		}
		else
		{
			echo "<p class='error'>No Book Record Found</p>";
		}
	?>
	
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