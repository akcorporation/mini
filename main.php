<!DOCTYPE html>
<html lang="en">
<head>
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
.inner_label{
	margin-left:40px;
	margin-right:40px;
	margin-top:10px;
}
.btn_click{
margin-left:40px;
}
ol li{
	padding-left:30px;
}

</style>
<section>
<div class="conatainer-fluid">
<div class="row">

<div class="col-lg-12">
<div class="header_title">
<h1>Add Telephone Directory Application</h1>
</div><!--end of header title-->
</div><!--end of col-lg-12-->

</div><!-- end of row-->
</div><!--end of container-->
</section>


<div class="conatainer">
<div class="row">

<div class="col-lg-12">                       
					   <hr>
                       
                       <ol class="breadcrumb">
					   
                           <li class="active">
                                <a href="index.php"><i class="fa fa-dashboard"></i> Add Telephone Directory</a>
                            </li>
							
							<li >
                                <a href="manage_number.php"><i class="fa fa-dashboard"></i> Manage Telephone Directory</a>
                            </li>
                        </ol>
                    </div>

<form>
<div class="col-lg-6">

<div class="inner_label">
 <label>Name *</label>
		<input type="text" class="form-control" onkeyup="show();" id="txt_name1" name="txt_name" placeholder="Enter Name *">
		<span class="error_class1">This Feild Is Important*</span>
</div><!--end of inner label-->
</div><!--end of col-lg-6-->

<div class="col-lg-6">
<div class="inner_label">
<label>Mobile Number *</label>
		<input type="number" class="form-control" onkeyup="show();" id="txt_mo1" name="txt_mo" placeholder="Enter Mobile Number *">
		<span class="error_class">Make Sure You Enter Only 10 Digit NO.*</span>
</div><!--end of inner label-->

</div><!--end of col-lg-6-->

<div class="col-lg-6">
<div class="inner_label" style="margin-top:0px;">
 <label>Name :</label>
<span class="name_value"></span> <br>
 <label>Number :</label>
<span class="number_value"></span>
</div><!--end of inner label-->

</div><!--end of col-lg-6-->

<div class="col-lg-6">
<button class="btn btn-sm btn-info btn_click" type="button">Submit</button> &nbsp;&nbsp;
		<button type="reset" class="btn btn-default btn-sm" onclick="show();">Close</button>
</div>
 </form>

</div><!-- end of row-->
</div><!--end of container-->


    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script>
	function show(){
		$(".name_value").html($("#txt_name1").val());
		$(".number_value").html($("#txt_mo1").val());
	}
	</script>
	
	<script>

$(".btn_click").on("click",function(e){

	if($("#txt_name1").val()=="" || $("#txt_name1").val()==null){
		
		$(".error_class1").css("visibility","visible");
		$("#txt_name1").focus();
	}
	else if($("#txt_mo1").val()=="" || $("#txt_mo1").val()==null){
		$(".error_class").css("visibility","visible");
		$("#txt_mo1").focus();
	}
	
	else{
		
		var first_name=$("#txt_name1").val();
		
		var phone=$("#txt_mo1").val();
		

		var filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ((filter.test(phone)) || (!isNaN(phone) && phone.length == 10)) {			
			$(".btn_click").attr("disabled",true);
			
			$.ajax({
				type:"POST",
				url:"telephone_do.php",
				data:{first_name:first_name,phone:phone},
				success:function(r_data){
					if(r_data=="s"){
						//alert("success");
						$(".btn_click").attr("disabled",false);
						alert("Phone Number Is Saved");
						window.location.replace("manage_number.php");
					}
					else{
						alert("Try Again !...");
						location.reload();						
					}
					
				},error:function(err){
					location.reload();
				}
			});
		}
		else{
			$(".error_class").css("visibility","visible");
			$("#txt_mo").focus();
		}
	}
	
	
});
</script>

<style>
.error_class{
	color:red;
	float:right;
	visibility:hidden;
}
.error_class1{
	color:red;
	float:right;
	visibility:hidden;
}
</style>
</body>
</html>