<?php
	
	
	
	
	function upload($fileName,$level,$conn,$img_no)
	{
		if ($_FILES[$fileName]["name"] == "" && $_GET['update']==true)
		{
			return;
		}
		$target_dir = "uploads/";
		echo $_FILES[$fileName]["name"];
		$target_file = $target_dir . basename($_FILES[$fileName]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES[$fileName]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
				} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_dir . basename($_FILES[$fileName]["name"]))) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES[$fileName]["size"] > 25000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		
		$imageFileType=strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		}
		
		else 
		{
			$target_file = $target_dir . $fileName .".".$imageFileType;
			if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) 
			{
				echo "The file ". basename( $_FILES[$fileName]["name"]). " has been uploaded.";
				
				//inserting image url
				$path="http://localhost/k!%20ROS/";
				
				$urlexists=sprintf("select * from images where level=%s and img_no=%s;",$level,$img_no);
				$urlpresent=mysqli_query($conn,$urlexists);
				if(mysqli_num_rows($urlpresent) <= 0)
				{
					$query = sprintf("insert into images values(%s,%s,'%s');",$level,$img_no,$path.$target_file);
					if (!mysqli_query($conn,$query)) 
					{
						$message  = 'Invalid query: ' . mysql_error() . "\n";
						$message .= 'Whole query: ' . $query;
						die($message);
					}
				}
				else
				{
					
				}
				
				
				
				
				} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
?>