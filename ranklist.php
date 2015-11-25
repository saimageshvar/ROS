
<?php
	include 'dbaccess.php';
	
	//$k_id=rmv_ws($_POST["k_id"]);
	$k_id="10002FE3";
	
	
	$conn=mysqli_connect($hostname,$username,$password,$dbname);
	
	$set_row_number=sprintf("set @row_number=0");
	mysqli_query($conn,$set_row_number);
	$select_top_ten_players=sprintf("select (@row_number:=@row_number + 1) AS rank, k_id,name from users order by level desc,start_time asc limit 10");
	$top_ten_players=mysqli_query($conn,$select_top_ten_players);
	$top_ten=array();
	$is_present=false;
	while($top_ten_player=mysqli_fetch_assoc($top_ten_players))
	{
		$top_ten[]=$top_ten_player;
		if($top_ten_player['k_id']==$k_id)
			$is_present=true;
		
	}
	if($is_present==false)
	{
		//get user rank logic
	}
	
	
	
	
	//encoded json format
	echo json_encode($top_ten);
	mysqli_close($conn);
	
	
?>
