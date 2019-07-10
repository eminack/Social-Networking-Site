<?php
include('header.php');
include('connect.php');
?>
<?php
$result = mysqli_query($connection,"SELECT * FROM members WHERE member_id='".$_SESSION['SESS_MEMBER_ID'] ."'");
while($row = mysqli_fetch_array($result))
  {
 
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }
?>