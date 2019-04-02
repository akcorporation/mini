<!DOCTYPE html>
<html lang="en">
<head>
<?php include("root/db_connection.php"); ?>
<title>Emergys Software Privated Limited</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

</head>
<body>

<style>
.header_title{
color:white;
background-color:black;
padding:20px;
text-align:center;
}
.table_content{
	padding-left:50px;
	padding-top:10px;
	padding-right:50px;
}
ol{
margin-top:20px;
}
ol li{
	padding-left:30px;
}
.inner_label{
	margin-left:40px;
	margin-right:40px;
	
}
</style>
<section>
<div class="conatainer-fluid">
<div class="row">

<div class="col-lg-12">
<div class="header_title">
<h1>Manage Telephone Directory Application</h1>
					  
                       
</div><!--end of header title-->
 <hr>
</div><!--end of col-lg-12-->

</div><!-- end of row-->
</div><!--end of container-->
</section>


<div class="conatainer">
<div class="row">

 <div class="col-lg-6">                       

                       <ol class="breadcrumb">
					   
                           <li>
                                <a href="index.php"><i class="fa fa-dashboard"></i> Add Telephone Directory</a>
                            </li>
							
							<li class="active">
                                <a href="manage_number.php"><i class="fa fa-dashboard"></i> Manage Telephone Directory</a>
                            </li>
                        </ol>
                    </div>
    <div class="col-lg-6">
	<div class="inner_label">
	<label>Name :</label>
	<input type="text" placeholder="Enter Name To Find Number*" class="search_box form-control" id="txtname" name="txtname" >
	</div>
     </div>

 <div class="col-lg-12 table_content">
 <table class="table table-striped table-bordered table-responsive table-hover table-condensed">
 <thead>
 <tr>
 <th>S.No</th>
 <th>Name</th>
 <th>Number</th>
 <th>Edit</th>
 </tr>
 </thead>
 <tbody id="table_show">
 <?php 
 $i=0;
 $telephone=$db->query("select * from telephone") or die("");
 while($telephone_res=$telephone->fetch(PDO::FETCH_ASSOC))
 { $i++;
 ?>
 <tr>
 <td><?php echo $i; ?></td>
 <td><?php echo $telephone_res['name']; ?></td>
 <td><?php echo $telephone_res['number']; ?></td>
 <td><button class="btn btn-sm btn-danger btn_delete" id="<?php echo $telephone_res['id']; ?>">Delete</button></td>
 </tr>
 <?php } ?>
 
 </tbody>
 </table>
 </div>

</div><!-- end of row-->
</div><!--end of container-->


    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script>
	
	$(".btn_delete").on("click",function(e){
		var cur_id=$(this).attr('id');
		
		$.ajax({
			type:"POST",
			url:"delete_telephone.php",
			data:{cur_id:cur_id},
			success:function(r_data){
				alert("Sucessfully Deleted !...");
				location.reload();
			},error:function(err){
			location.reload();
			}
		});
		
		
	});
	
	</script>
	
	<script>
$(".search_box").on("keyup",function(e){
	var cur_val=$("#txtname").val();
	
	$.ajax({
		type:"POST",
		data:{cur_val:cur_val},
		dataType:"json",
		cache:false,
		url:"search_page.php",
		success:function(r_data){
			
			var empty_res="";
			if(r_data.length==0){
				//alert("No Data Found !...");
				$("#table_show").html("No Data Found !...");	
			}
			else{
				for(i=0; i<r_data.length; i++){
					//console.log(r_data[i].test_title);		//console.log(r_data[i].post_m_title);					
					var s_data="<tr><td>"+i+"</td><td>"+r_data[i].name+"</td><td>"+r_data[i].number+"</td><td><button class='btn btn-sm btn-danger btn_delete' id="+r_data[i].id+">Delete</button></td></tr>";					
					empty_res=empty_res+s_data;
                  // console.log(empty_res);
				}
				$("#table_show").html(empty_res);
							
			}
		},error:function(err){
			//alert("Try Again !...");
			//location.reload();
		}
	});
});
</script>
</body>
</html>