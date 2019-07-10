<?php include('connect.php')?>
<?php


 
 function clean($str,$connection) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($connection,$str);
	}

$messages = clean($_POST['message'],$connection);
$poster =clean($_POST['poster'],$connection);

$sql="INSERT INTO comment (comment,date_created, member_id)
VALUES
('$messages','".strtotime(date("Y-m-d H:i:s"))."','$poster')";

if (!mysqli_query($connection,$sql))
  {
  die('Error: ' . mysqli_error($connection));
  }
header("location: Home.php");
exit();



?>
