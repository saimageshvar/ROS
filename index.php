<html>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<body>
		<br>
		<center>
			<a href="add_question.html"><button class ="btn btn-success">Add New Question</button></a>
		</center>
		<br>
		<?php
			session_start();
			if(isset($_SESSION["k_id"]))
				echo "<p align='right'>Welcome ".$_SESSION["name"]."</p>";
			else
				echo "<p align='right'><a href='register.php'>Register</a></p>";
			include 'dbaccess.php';
			$conn=mysqli_connect($hostname,$username,$password,$dbname);
			
			if($conn)
			{
				$query = sprintf("select level,answer,url_hint,img_count,clues from questions;");
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					echo "<table class='table 	' ><tr><th>Level</th><th>Answer</th><th>Url Hint</th><th>Clue</th><th>Image Url</th><th>Edit</th><th>Delete</th></tr>";
					
					while($row=mysqli_fetch_assoc($result))
					{
						$count=$row['img_count'];
						$level=$row['level'];
						echo "<tr>";
						echo "<td rowspan='".$count."'>".$row['level']."</td>";
						echo "<td rowspan='".$count."'>".$row['answer']."</td>";
						echo "<td rowspan='".$count."'>".$row['url_hint']."</td>";
						echo "<td rowspan='".$count."'>".$row['clues']."</td>";
						$flag=false;
						$i=0;
						$sql=sprintf("select img0,img1,img2,img3 from questions where level=%s;",$level);
						$urls=mysqli_query($conn,$sql);
						$url=mysqli_fetch_assoc($urls);
						while($i < $count)
						{
							
							if($flag==true)
							{
								echo "<tr>";
							}
							echo "<td>".$url['img'.$i] ."</td>";
							if($flag==false)
							{
								echo "<td rowspan='".$count."'><a href='edit.php?level=".$level."'>Edit</a></td>";		
								echo "<td rowspan='".$count."'><a href='delete.php?level=".$level."'>Delete</a></td>";		
								echo "</tr>";
								$flag=true;
							}
							$i++;
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
