<?php require("connect.php")?>

<?php

//Start session
session_start();



	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str,$connection) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($connection,$str);
	}
	
		//Sanitize the POST values
$UserName = clean($_POST['UserName'],$connection);
	$Password =(md5($_POST['Password']));
	
		
	
	
	
		//Create query
	$qry="SELECT * FROM members WHERE UserName='$UserName' AND Password='$Password'";
	$result=mysqli_query($connection,$qry);
	
		//Check whether the query was successful or not
if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['FirstName'];
			$_SESSION['SESS_LAST_NAME'] = $member['LastName'];
			
			session_write_close();
			header("location: Home.php");
			exit();
		}else {
			//Login failed
			header("location: errorlogin.php");
			exit();
		}
	}else {
		die("Query failed");
	}	
	


?>

