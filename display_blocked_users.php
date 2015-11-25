
<?php
	include 'dbaccess.php';
	
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	
	$select_blocked_users=sprintf("select k_id,name from users where blocked=true");
	$blocked_users=mysqli_query($conn,$select_blocked_users);
	if(mysqli_num_rows($blocked_users) > 0)
	{
		echo "<table border='1'><tr><th>K Id</th><th>Name</th></tr>";
		while($blocked_user=mysqli_fetch_assoc($blocked_users))
		{
			echo "<tr>";
			echo "<td>".$blocked_user['k_id']."</td>";
			echo "<td>".$blocked_user['name']."</td>";
			echo "</tr>";
		}	
		echo "</table>";
		
	}
	
	mysqli_close($conn);
	
	
?>
	
	
	
	
	
