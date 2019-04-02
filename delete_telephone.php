<?php 
include("root/db_connection.php"); 
if(isset($_REQUEST['cur_id'])){
		$cur_id=str_Replace("'","",$_REQUEST['cur_id']);
		$delQ=$db->query("delete from telephone where id=$cur_id ") or die("");
		?>
			<script>
				
				window.location.replace("manage_number.php");
			</script>
		<?php
	}
	else{
		echo "Try Agin !...";
	}	
?>