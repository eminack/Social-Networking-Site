

<?php
	require_once('session.php');
?>
	
	
	
	
<?php
include('connect.php');

$idto = $_GET['id'];
$member = $_SESSION['SESS_MEMBER_ID'];

$temp=mysqli_query($connection,"delete from friends where member_id='$member' and friends_with='$idto' " )or die(mysqli_error($connection));
//$tempa=mysqli_num_rows($temp);	

$temp=mysqli_query($connection,"delete from friends where member_id='$idto' and friends_with='$member' " )or die(mysqli_error($connection));
//$tempa=mysqli_num_rows($temp);

//mysqli_query($connection,"INSERT INTO friends(member_id,datetime,status,friends_with) VALUES('$member',now(),'unconf','$idto') ")or die(mysqli_error($connection));

?>

<html>


<body>
<div class="facebox">
<?php
								$member_id = $_SESSION['SESS_MEMBER_ID'];
								$post = mysqli_query($connection,"SELECT * FROM members WHERE member_id='$member_id'")or die(mysqli_error($connection));
								while($row = mysqli_fetch_array($post)){
									echo '
									
										<div class="pic2"><img src="'.$row['profImage'].'" alt="" height="70" width="70" border="0" class="left_bt" /></div>								
										<div class="pi">'.$row['FirstName']." ".$row['LastName'].'</div>
										
										<div class="message3">Your friend has been removed !</div>
									';
									
								}
								
							?>
							</div>
</body>
</html>