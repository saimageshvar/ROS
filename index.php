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
				$query = sprintf("select * from questions;");
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					echo "<table border='2' style='text-align:center'><tr><th>Level</th><th>Answer</th><th>Url Hint</th><th>Clue</th><th>Image Url</th></tr>";
					
					while($row=mysqli_fetch_assoc($result))
					{
						$count=$row['img_count'];
						$level=$row['level'];
						echo "<tr>";
						echo "<td rowspan='".$count."'>".$row['level']."</td>";
						echo "<td rowspan='".$count."'>".$row['answer']."</td>";
						echo "<td rowspan='".$count."'>".$row['url_hint']."</td>";
						echo "<td rowspan='".$count."'>".$row['clues']."</td>";
						$query=sprintf("select * from images where level=".$level.";");
						$urls=mysqli_query($conn,$query);
						$flag=false;
						while($url=mysqli_fetch_assoc($urls))
						{
							if($flag==true)
							echo "<tr>";
							echo "<td>".$url['url'] ."</td>";
							if($flag==false)
							{
								echo "<td rowspan='".$count."'><a href='http://localhost/k!%20ros/edit.php?level=".$level."'>Edit</a></td>";		
								echo "<td rowspan='".$count."'><a href='http://localhost/k!%20ros/delete.php?level=".$level."'>Delete</a></td>";		
								echo "</tr>";
								$flag=true;
							}
						}
						echo "</tr>";
					}
					echo "</table>";
				}
				
				
				mysqli_close($conn);	
			}
		?>
	</body>
</html>
