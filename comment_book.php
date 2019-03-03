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
      <h3 id="heading">Comment Book</h3>
	
		<?php 
		if(isset($_POST["submit"]))
		{
			$sql="insert into comment (BID,SID,COMM,LOGS) values ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["comment"]}',now())";
			$res=$db->query($sql);
			
		}
		
		
		$sql="SELECT * FROM book WHERE BID=".$_GET["id"];
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>";
					while($row=$res->fetch_assoc())
					{
							echo "<tr><th>TITLE</th><td>{$row["BTITLE"]}</td></tr>";
							echo "<tr><th>KEYWORDS</th><td>{$row["KEYWORDS"]}</td></tr>";
					}
				echo "</table>";
				?>
					<div id="center">
						<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
							<label>Your Comments</label>
							<textarea name="comment" required></textarea>
							<button type="submit" name="submit">Post Now</button>
						</form>
						<?php 
							$s="
Select student.NAME, comment.COMM, comment.LOGS, comment.BID
From comment Inner Join
  student On comment.SID = student.ID
Where comment.BID =".$_GET["id"]." order by comment.CID DESC";
							$r=$db->query($s);
							if($r->num_rows>0)
							{
								while($ro=$r->fetch_assoc())
								{
									echo "<p><strong>{$ro["NAME"]} : </strong>
											{$ro["COMM"]}   
											<i>&nbsp;&nbsp;{$ro["LOGS"]}</i></p>";
								}
							}
							else
							{
								echo "<p>Still No Comment Added</p>";
							}
				
						?>
					</div>
				<?php
			}
			else
			{
				echo "<p class='error'>No Book Record Found</p>";
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
