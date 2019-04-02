<?php
include("root/db_connection.php");

if(isset($_REQUEST['cur_val'])){
	$cur_val=str_replace("'","",$_REQUEST['cur_val']);
	
	if($cur_val=="" || $cur_val==null)
	{
	
	$imgcond='';
	}
	else{
	$imgcond="where name like '%$cur_val%'";	
	}

	
	$query=$db->query("SELECT * from telephone $imgcond ") or die("");
	if($query->rowCount()==0){
		echo json_encode("");
	}
	else{
		while($result=$query->fetch(PDO::FETCH_ASSOC)){
			$fetchArray[]=$result;
		}
		echo json_encode($fetchArray);
	}
}
else {
	echo json_encode("err");
}
?>