<?php
	include 'dbaccess.php';
	
	/*$k_id=rmv_ws($_POST["k_id"]);
	$name=rmv_ws($_POST["name"]);
	$phone_number=rmv_ws($_POST["answer"]);
	$mail_id=rmv_ws($_POST["url_hint"]);
	$event_1=rmv_ws($_POST["event_1"]);
	$event_2=rmv_ws($_POST["event_2"]);*/
	
	
	
	$k_id='1241DS';
	$name='sai';
	$phone_number=4434311245;
	$mail_id='afafh@hmao.com';
	$event_1='biz';
	$event_2='chaos';
	
	
	//db access
	
	
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	
	if($conn)
	{
		$query = sprintf("insert into xceed_registrations values('%s','%s',%s,'%s','IIM-A','%s','%s');",$k_id,$name,$phone_number,$mail_id,$event_1,$event_2);
		
		if (!mysqli_query($conn,$query)) 
		{
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		else
		echo "<script type='text/javascript'>alert('Registered Successfully')</script>";
		mysqli_close($conn);
		
	}	
		
		
		
		//removing whitespace
		function rmv_ws($value)
		{
			global $flag;
			$value=trim($value);
			if($value=="" && $flag==true)
			{
				echo "You have entered a blank space.<br/><br/>";
				global $flag;
				$flag=false;
			}
			return $value;
		}
		
		
		
	?>	