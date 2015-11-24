<html>
	<body>
		<p align="right"><a href="add_question.html">Add New Question</a></p>
		<?php
			include 'dbaccess.php';
			$conn=mysqli_connect($hostname,$username,$password,$dbname);
			
			if($conn)
			{
				$query = sprintf("select * from questions where level=%s;",$_GET['level']);
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$count=$row['img_count'];
						$level=$row['level'];
					?>
					<form method="post" action="update.php?update=true" enctype="multipart/form-data">
						<input type="hidden" id="hiddenCount" value="<?php echo $count ?>" />
						Level <input type="number" name="level" id="level" value="<?php echo $row['level'] ?>" required  readonly/> <br />
						Answer <input type="text" name="answer" value="<?php echo $row['answer'] ?>" required /> <br />
						Url Hint <input type="text" name="url_hint" value="<?php echo $row['url_hint'] ?>" required /> <br />
						Clue <input type="text" name="clue" value="<?php echo $row['clues'] ?>" required /> <br />
						Count <input type="number" name="count" id="count" value="<?php echo $row['img_count'] ?>" min="0" onchange="generate(this.value)" required /> <br />
						<span id="fooBar">&nbsp;</span>
						
						<?php
							$query=sprintf("select img0,img1,img2,img3 from questions where level=".$level.";");
							$urls=mysqli_query($conn,$query);
							$img_path="http://localhost/k!%20ROS";
							$url=mysqli_fetch_assoc($urls);
							for($i=0;$i< $count;$i++)
							{
								
							?>
							
							<img id="<?php echo 'i'.$level.'_'.$i ?>" src="<?php echo $img_path.$url['img'.$i] ?>" height="75" width="75" />
							<input type="file" id="<?php echo $level.'_'.$i ?>" />
							<input type="button" value="remove" id="<?php echo 'b'.$level.'_'.$i ?>" onclick="rem('<?php echo $level.'_'.$i ?>','<?php echo $url['img'.$i] ?>','<?php echo $level ?>','<?php echo $i ?>'); "/>
							<input type="hidden" id="img_url" value="'<?php echo $img_path.$url['img'.$i] ?>'" />
							<br/>
							
							<?php	
							}
							
						}
					?>
					<br />
					<input type="submit" value="update">
					
					
				</form>
				

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				
				<script>
					function rem(name,url,level,id)
					{
						
						$("#"+name).remove();
						$("#b"+name).remove();
						$("#i"+name).remove();
						var cnt=document.getElementById("hiddenCount").value;
						cnt=cnt-1;
						document.getElementById("count").value=cnt;
						document.getElementById("hiddenCount").value=cnt;
						window.location="deleteImage.php?url="+url+"&level="+level+"&id="+id+"&count="+cnt;
						
					}
				</script>
				
				<script>
					function generate(count)
					{
						$("#fooBar").empty();
						var level=document.getElementById("level").value;
						var old_count=document.getElementById("hiddenCount").value;
						count=count-old_count;
						for(i=0;i<count;i++)
						{
							var element = document.createElement("input");
							
							
							element.setAttribute("type", "file");
							element.setAttribute("name", level+"_"+i);
							
							
							var foo = document.getElementById("fooBar");
							
							foo.appendChild(element);
							
						}
						
					}
					
				</script>
				<?php	
				}
				
				
				mysqli_close($conn);	
			}
		?>
	</body>
</html>
