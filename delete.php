<html>
	<body>
		<p align="right"><a href="add_question.html">Add New Question</a></p>
		<?php
			include 'dbaccess.php';
			$conn=mysqli_connect($hostname,$username,$password,$dbname);
			
			if($conn)
			{
				$query = sprintf("select img0,img1,img2,img3,img_count from questions where level=%s;",$_GET['level']);
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					$row=mysqli_fetch_assoc($result);
					$i=0;
					while($i < $row['img_count'])
					{
						unlink(".".substr($row['img'.$i],0));
						$i++;
					}
	
				}
				$query = sprintf("delete from questions where level=%s;",$_GET['level']);
				mysqli_query($conn,$query);
				mysqli_close($conn);
				echo "<meta http-equiv='refresh' content='0;index.php'/>";
			}
			
		?>
	</body>
</html>
