<?php
	include 'dbaccess.php';
	
	//$k_id=rmv_ws($_POST["k_id"]);
	$k_id="10002FE3";
	
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	$block_user=sprintf("update users set blocked=true where k_id='%s'",$k_id);
	if(mysqli_query($conn,$block_user))
		echo "blocked";
	
	mysqli_close($conn);
	
	
?>
	
	
	
	
	
	