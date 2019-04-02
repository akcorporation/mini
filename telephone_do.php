<?php include("root/db_connection.php"); 
if(isset($_REQUEST['first_name']) &&  isset($_REQUEST['phone'])){	
	$first_name=str_replace("'","",$_REQUEST['first_name']);	
	$phone=str_replace("'","",$_REQUEST['phone']);		
	$insQ=$db->query("insert into telephone(name,number) values('$first_name',$phone)") or die("");
	echo "s";			
}
else{
	echo "err";
}
?>