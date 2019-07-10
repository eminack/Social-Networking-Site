<?php
  require ("connect.php");  
?>  
	
<?php
	$ID =$_REQUEST['message_id'];
	mysqli_query($connection,"DELETE FROM messages WHERE message_id = '$ID'")
	or die(mysqli_error($connection));  	
	header("Location: receivemessage.php");
?>