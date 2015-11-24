<?php
	include 'dbaccess.php';
	session_start();
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	//$k_id=rmv_ws($_POST["k_id"]);
	//$name=rmv_ws($_POST["name"]);
	$k_id="10002FE3";
	$name="sai";
	//setting session variables
	$_SESSION["k_id"]=$k_id;
	$_SESSION["name"]=$name;
	$insert=sprintf("insert into users (k_id,name) values ('%s','%s')",$k_id,$name);
	mysqli_query($conn,$insert);
	echo "<meta http-equiv='refresh' content='0;index.php'/>";
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