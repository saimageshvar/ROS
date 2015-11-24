<?php
	include 'dbaccess.php';
	
	//$k_id=rmv_ws($_POST["k_id"]);
	//$level=rmv_ws($_POST["level"]);
	//$answer=rmv_ws($_POST["answer"]);
	
	$k_id="10002FE3";
	$level=1;
	$answer="CTF";
	
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	
	//inserting into log
	$insert_log=sprintf("insert into log (k_id,level,answer) values ('%s',%s,'%s')",$k_id,$level,$answer);
	mysqli_query($conn,$insert_log);
	
	//checking ans
	$get_answer=sprintf("select answer from questions where level=%s",$level);
	$correct_answer=mysqli_fetch_assoc(mysqli_query($conn,$get_answer));
	if($answer==$correct_answer['answer'])
	{
		$update_user=sprintf("update users set level=level+1,start_time=current_timestamp where k_id='%s'",$k_id);
		mysqli_query($conn,$update_user);
		
		//logic for points increment
		
		echo "success";
	}
	else
	{
		$update_user=sprintf("update users set lives=lives-1 where k_id='%s'",$k_id);
		mysqli_query($conn,$update_user);
		echo "failure";
	}
	mysqli_close($conn);
?>
