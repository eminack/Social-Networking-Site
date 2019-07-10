
<?php
	require_once('session.php');
?>
	
	
	
	
<?php
include('connect.php');


	$id = $_GET['id'];
	$user_id=$_SESSION['SESS_MEMBER_ID'];
	mysqli_query($connection,"UPDATE friends SET status = 'conf' WHERE member_id = '$id'")or die(mysqli_error($connection));
	mysqli_query($connection,"DELETE from friends where friends_with='$id' and member_id='$user_id' and status='unconf'")or die(mysqli_error($connection));
?>


<html>
<body>
<?php
								$post = mysqli_query($connection,"SELECT * FROM members WHERE member_id='$id'")or die(mysqli_error($connection));
									$row = mysqli_fetch_array($post);
									echo '
										
										<div align="left">'.$row['FirstName']." ".$row['LastName']. '<style="text-decoration:none;">has been successfully added to your schoolfriends</div>
										<div align="right"></div>
									';
								
							?>


</body>
</html>