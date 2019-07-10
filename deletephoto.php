<?php
				  if (isset($_GET['id']))
	{
			$con = mysqli_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error($con));
			  }
			
			mysqli_select_db($con,"db");
			$comment_id = $_GET['id'];
			
			mysqli_query($con,"DELETE FROM photos WHERE photo_id='$comment_id'");
			header("location: photos.php");
			exit();
			
			mysqli_close($con);
			}
			?>