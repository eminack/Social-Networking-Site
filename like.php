<?php
	  if (isset($_GET['id']))
	{
			$con = mysqli_connect("127.0.0.1", "root", "");
			if (!$con)
			  {
			  die('Could not connect: ' . mysqli_error($con));
			  }
			
	mysqli_select_db($con,"db");
	$post_id = $_GET['id'];	
	$user_id = $_GET['user_id'];		 
	include('connect.php');
	require('session.php');
	$id=$_SESSION['SESS_MEMBER_ID'];
			//mysql_query("INSERT INTO like(like, likeby) VALUES ('$messages_id','$likeby')");
	$temp=mysqli_query($connection,"select * from likes where post_id='$post_id' and remarksby='$user_id' ")or die(mysqli_error($connection));
	$tempa=mysqli_num_rows($temp);
	//echo $tempa;
	if ($tempa==0)
	{
		$sql="INSERT INTO likes (post_id, remarksby)
			VALUES('$post_id','$user_id')";
		mysqli_query($connection,$sql)or die(mysqli_error($connection));
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
	exit();
			
	mysqli_close($connection);
}
			
	?>