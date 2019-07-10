<?php require('connect.php');?>
<?php

	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
		//Validation error flag
	$errflag = false;
	
		//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str,$connection) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($connection,$str);
	}
	
	
	//Sanitize the POST values
	$fname = clean($_POST['fname'],$connection);
	$lname = clean($_POST['lname'],$connection);
	$login = clean($_POST['login'],$connection);
	$password = clean($_POST['password2'],$connection);
	$cpassword = clean($_POST['cpassword'],$connection);
	$address = clean($_POST['address'],$connection);
	$cnumber = clean($_POST['cnumber'],$connection);
	$email = clean($_POST['email'],$connection);
	$gender = clean($_POST['gender'],$connection);
	//$bdate = clean($_POST['bdate']);
	
	$propic = clean($_POST['propic'],$connection);
	$bday=$_POST['month'] . "/" . $_POST['day'] . "/" . $_POST['year'];
  	$month=$_POST['month'];
	$day=$_POST['day'];
	$year=$_POST['year'];
	//Input Validations
	
	
	
			if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	
	
	
	
	
	
	/*if($bdate == '') {
		$errmsg_arr[] = 'birthdate field is  missing';
		$errflag = true;
	}*/
		if($lname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	
	if($month == '') {
		$errmsg_arr[] = 'month field is  missing';
		$errflag = true;
	}
	if($day == '') {
		$errmsg_arr[] = 'day field is  missing';
		$errflag = true;
	}
	if($year == '') {
		$errmsg_arr[] = 'year field is  missing';
		$errflag = true;
	}
	if($gender == '') {
		$errmsg_arr[] = 'gender field is  missing';
		$errflag = true;
	}
	if($email == '') {
		$errmsg_arr[] = 'email field is  missing';
		$errflag = true;
	}
	if($cnumber == '') {
		$errmsg_arr[] = 'contactnumber field is  missing';
		$errflag = true;
	}
	if($address == '') {
		$errmsg_arr[] = 'address field is  missing';
		$errflag = true;
	}

	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE UserName='$login'";
		$result = mysqli_query($connection,$qry);
		if($result) {
			if(mysqli_num_rows($connection,$result) > 0) {
				$errmsg_arr[] = 'UserName already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}

//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(UserName, Password, FirstName, LastName, Address, ContactNo, Url, Birthdate, Gender, profImage, curcity, month, day, year) VALUES('$login','$password','$fname','$lname','$address','$cnumber','$email','$bday','$gender','$propic','$address','$month','$day','$year')";
	$result = @mysqli_query($connection,$qry);
	
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Success You can now log-in to bookface';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
		
		session_regenerate_id();
			$member = mysqli_fetch_assoc($connection,$result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['FirstName'];
			$_SESSION['SESS_LAST_NAME'] = $member['profImage'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			
		header("location: signup-success.php");
		exit();
	}else {
		die("Query failed");
	}








?>