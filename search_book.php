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
      <h3 id="heading">Search Book</h3>
		<div id="center">
			  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				<label>Enter Book Name or Keyword</label>
				<input type="text" name="name" required>
				<button type="submit" name="submit">Search Now</button>
			  </form>
		</div>
		<?php 
		if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM book WHERE BTITLE like '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%' ";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>";
						echo "<tr>";
							echo "<th>SNO</th>";
							echo "<th>TITLE</th>";
							echo "<th>KEYWORDS</th>";
							echo "<th>VIEW</th>";
							echo "<th>COMMENT</th>";
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
						echo "<td><a href='comment_book.php?id={$row["BID"]}'>Comment</a></td>";
						echo "</tr>";
					}
				echo "</table>";
			}
			else
			{
				echo "<p class='error'>No Book Record Found</p>";
			}
		}
	?>
	
		
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
