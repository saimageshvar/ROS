<html>
	<body>
		<p align="right"><a href="http://localhost/k!%20ROS/ui%20page.html">Add New Question</a></p>
		<?php
			$hostname="localhost";
			$username="localhost";
			$password="password";
			$dbname="ros";
			$conn=mysqli_connect($hostname,$username,$password,$dbname);
			
			if($conn)
			{
				$query = sprintf("select * from images where level=%s;",$_GET['level']);
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						unlink(".".substr($row['url'],25));
					}
				}
				$query = sprintf("delete from questions where level=%s;",$_GET['level']);
				mysqli_query($conn,$query);
				$query = sprintf("delete from images where level=%s;",$_GET['level']);
				mysqli_query($conn,$query);
				mysqli_close($conn);
				echo "<meta http-equiv='refresh' content='0;index.php'/>";
			}
			
		?>
	</body>
</html>
