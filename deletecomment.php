
<?php
				  if (isset($_GET['id']))
	{
			$con = mysqli_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error($con));
			  }
			
			mysqli_select_db($con,"db");
			$messages_id = $_GET['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysqli_query($con,"DELETE FROM postcomment WHERE comment_id='$messages_id'");
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
			
			mysqli_close($con);
			}
	?>