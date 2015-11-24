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
							$query=sprintf("select * from images where level=".$level.";");
							$urls=mysqli_query($conn,$query);
							for($i=0;$i< $count;$i++)
							{
								$url=mysqli_fetch_assoc($urls);
							?>
							
							<img id="<?php echo 'i'.$level.'_'.$i ?>" src="<?php echo $url['url'] ?>" height="75" width="75" />
							<input type="file" id="<?php echo $level.'_'.$i ?>" />
							<input type="button" value="remove" id="<?php echo 'b'.$level.'_'.$i ?>" onclick="rem('<?php echo $level.'_'.$i ?>')"/>
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
					function rem(name)
					{
						$("#"+name).remove();
						$("#b"+name).remove();
						$("#i"+name).remove();
						var cnt=document.getElementById("hiddenCount").value;
						cnt=cnt-1;
						document.getElementById("count").value=cnt;
						document.getElementById("hiddenCount").value=cnt;
						
						
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
