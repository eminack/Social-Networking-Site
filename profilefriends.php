  <?php
	require_once('session.php');
	include("function.php");
		$userid = $_GET['id'];
?>

<html>
<script type="text/javascript">

<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<head><title>search</title></head>
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/icon.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
   </script>
<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
-->
</style>
</body>
<div id="shadow" class="popup"></div>

  <div class="lefttop1">
  <div class="lefttopleft"><img src="img/logo.png" width="150" height="40" /></div>
   <div class="propic">
	<?php
include('connect.php');
$member_id = $_SESSION['SESS_MEMBER_ID'];
					$post = mysqli_query($connection,"SELECT * FROM members WHERE member_id = '$userid'")or die(mysqli_error($connection));
					$row = mysqli_fetch_array($post); 

?>
	<img src="<?php echo $row['profImage'];?>" alt="" height="140"  width="140" border="0" class="left_bt" />
</div>
<ul id="sddm1">
	
	<li><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
	</li>
	<li>
	<?php $id = $row['member_id'];
			echo "<a href='profilefriends.php?action=view&id=".$id."'><img src=img/message.png width=17 height=17 border=0 />"."&nbsp;&nbsp;Info"."</a>"  ?>
		</li>	
	<li><?php $id = $row['member_id'];
			echo "<a href='friendsphoto.php?action=view&id=".$id."'><img src=img/photos.png width=17 height=17 border=0 />"."&nbsp;&nbsp;Photos"?>(<?php
$result = mysqli_query($connection,"SELECT * FROM photos WHERE member_id='$userid'");
	
	$numberOfRows = mysqli_num_rows($result);	
	
	echo '<font color="red">' . $numberOfRows . '</font>'; 
	?>)</a>
	
	<li><hr width="150"></li>
	<li>
	</ul>
	<div class="friend">
	<ul id="sddm1">
	<li><a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends
	
	(<?php

	$id=$userid;

	mysqli_query($connection,"CREATE TEMPORARY TABLE IF NOT EXISTS inbox AS (select member_id from friends where friends_with='$id' and status='conf')")or die(mysqli_error($connection));
	mysqli_query($connection,"insert into inbox select friends_with from friends where member_id='$id' and status='conf' ")or die(mysqli_error($connection));
	$result = mysqli_query($connection,"SELECT * FROM members where member_id in (select * from inbox) and member_id!='$id' ");
	$numberOfRows = mysqli_num_rows($result);		
	echo '<font color="Red">' . $numberOfRows. '</font>';
	?>)
	</a>
	</li>
	</ul>
	<ul id="sddm1">
  <?php
							
							
			if ($numberOfRows != 0 ){

								while($row = mysqli_fetch_array($result)){
				
								$myfriend = $row['member_id'];
								$id=$_SESSION['SESS_MEMBER_ID'];
								
																
										$friends = mysqli_query($connection,"SELECT * FROM members WHERE member_id = '$myfriend'")or die(mysqli_error($connection));
										$friendsa = mysqli_fetch_array($friends);
										
									echo '<li> <a href=friendprofile.php?id='.$row["member_id"].' style="text-decoration:none;"><img src="'. $row['profImage'].'" height="50" width="50"></li><br><li>'.$row['FirstName'].' '.$row['LastName'].' </a> </li>';
										
									}
			}else
				{
					echo 'You don\'t have friends </li>';
				}
			mysqli_query($connection,"drop table inbox");
					
						
							
							?>
							</ul>
							
							<ul id="sddm1">
							<li><hr width="150"></li>
							</ul>
							</div>
  </div>
  <div class="righttop1">
       <div class="search">
       <form action="search.php" method="POST">
        <input name="search" type="text" maxlength="30" class="textfield"  value="search"/>
	
      </form>
</div>
    <div class="nav">
      <ul id="sddm">
        <li><a href="profile.php" ><?php


$result = mysqli_query($connection,"SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row = mysqli_fetch_array($result))
  {
  echo "<img width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
echo"  ";
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }

?></a></li>
      <li><a href="Home.php">Home</a></li>
               <li><a  href="#"onmouseover="mopen('m5')" onmouseout="mclosetime()">Account</a>
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>
        
		<a href="logout.php"><font size="2" class="font1">Logout</font></a>
        </li>
      </ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  </div>
  
<div class="right" style="margin-left: 330">
	
<div class="shoutout">

		 
	
		  
		  
		
		
									<form method="post" action="">
									<?php
									$member_id = $_SESSION['SESS_MEMBER_ID'];
									$post = mysqli_query($connection,"SELECT * FROM members WHERE member_id = '$userid'")or die(mysqli_error($connection));
									$row = mysqli_fetch_array($post); 
									?>
									<div class="color"><h2><?php echo $row['FirstName']." ".$row['LastName'];?></h2></div>
									<div  class="ball"><h3 id="h2">&nbsp;Education</h3></div>
									</br><div class="information"><font color="#0e1641"><b>College:</b></font>
									</br><div class="information"><?php echo $row['college'];?></div> <hr width="650">
									
									</br><font color="#0e1641"><b>High School:</b></font>
									</br><div class="information"><?php echo $row['highschool'];?></div> <hr width="650">
									
									<div  class="ball"><h3 id="h2">&nbsp;Basic Information</h3></div>
									</br><div class="information"><font color="#0e1641"><b>About You:</b></font> 
									<div class="information"><?php echo $row['aboutme'];?></div><hr width="650">
									
									</br><font color="#0e1641"><b>Address:</b></font> 
									<div class="information"><?php echo $row['Address'];?></div><hr width="650">
									
									</br><font color="#0e1641"><b>Interested In:</b></font>
									<div class="information"><?php echo $row['Interested'];?></div><hr width="650">
									
									 </br><font color="#0e1641"><b>Gender:</b></font>
									<div class="information"><?php echo $row['Gender'];?></div><hr width="650">
									
									
									</br><font color="#0e1641"><b>BirthDate:</b></font>
									<div class="information"><?php echo $row['Birthdate'];?></div><hr width="650">
									
									</br><font color="#0e1641"><b>Language:</b></font>
									<div class="information"><?php echo $row['language'];?></div><hr width="650">
									
									 <div  class="ball"><h3 id="h2">&nbsp;Contact Information</h3></div>
									  </br><div class="information"><font color="#0e1641"><b>Email Address:</b></font>
									  <div class="information"><?php echo $row['Url'];?></div><hr width="650">
									
								
								</form>

       
	   
	</div>

 
  
</body>
</html>
  