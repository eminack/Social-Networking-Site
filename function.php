	<?php	
	function searchmembers($search_term,$connection){
			$id=$_SESSION['SESS_MEMBER_ID'];

			mysqli_query($connection,"CREATE TEMPORARY TABLE IF NOT EXISTS inbox AS (select member_id from friends where friends_with='$id' and status='conf')")or die(mysqli_error($connection));
			mysqli_query($connection,"insert into inbox select friends_with from friends where member_id='$id' and status='conf' ")or die(mysqli_error($connection));
			mysqli_query($connection,"insert into inbox values('$id')")or die(mysqli_error($connection));

			$sql = mysqli_query($connection,"SELECT * FROM members WHERE FirstName LIKE '%$search_term%' OR LastName LIKE '%$search_term%' LIMIT 0, 30 ") or die (mysql_error());
		            $num_of_row   = mysqli_num_rows($sql);
			    if ($num_of_row > 0 ){
					 while($row    = mysqli_fetch_array($sql))
					{ 
						$row_id = $row['member_id'];
						
						$pampa=mysqli_query($connection,"select * from members where '$row_id'='$id'");
						$pampa_no=mysqli_num_rows($pampa);

						$temp=mysqli_query($connection,"select * from members where '$row_id' in(select * from inbox)")or die(mysqli_error($connection));
						$tempa=mysqli_num_rows($temp);

						echo "<a href=".$row['profImage']." rel=facebox;><img src='".$row['profImage']."' width='50' height='50' style='margin-right:4px;'></a>";
						echo "</span><div class='clr2'></div>";
						if($pampa_no==0)
						{
							echo "<a href='friendprofile.php?action=view&id=".$row_id."' style='color:blue; text-decoration:none;'>". $row['FirstName']."&nbsp;".$row['LastName']."</a>";
						}
						else
						{

							echo "<a href='profile.php' style='color:blue; text-decoration:none;'>". $row['FirstName']."&nbsp;".$row['LastName']."</a>";
						}

						
						if ($tempa==0)		//for non friends
						{
							echo "<p>"."<a href='addfriend.php?action=view&id=".$row_id."' style='color:orange; text-decoration:none;'rel = 'facebox' >Add as Friend</a>"."</p>";
							echo "<hr>";
						}
						if($tempa>0 and $pampa_no==0)		//for friends
						{
							echo "<p>"."<a href='deletefriend.php?action=view&id=".$row_id."' style='color:red; text-decoration:none;'rel = 'facebox' >Unfriend</a>"."</p>";
							echo "<hr>";
						}
						else if($tempa>0 and $pampa_no>0)		//for same name as profile
						{
							echo "<p>"."<a href='addfriend.php?action=view&id=".$row_id."' style='color:red; text-decoration:none;'rel = 'facebox' ></a>"."</p>";
							echo "<hr>";
						}
				}
			}
				else
				{
			
				  echo "<font color='red' size='4' >No result found!</font>";
				}
				mysqli_query($connection,"drop table inbox");
	
				
				

}	
?>