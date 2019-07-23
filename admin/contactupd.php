<?php include "header.php";?>

<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Enquiries </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Enquiries </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$Message = isSet($Message) ? $Message : '' ;
$license=isSet($license)?$license:'';
$price=isSet($price)?$price:'';
$product_id=isSet($product_id)?$product_id:'';
$cat_id = isset($cat_id)?$cat_id:'';
$msg = "";

$id=$db->escapstr($id);
$emails = $db->singlerec("select email from contact where id='$id'");
$tomail=$emails['email'];

if(isset($send)) {
	$subject = isset($subject)?$subject:'';
	$message = isset($message)?$message:'';
	if(!empty($subject) && !empty($message)){
		$com_obj->email($siteemail,$tomail,"$subject","$message");	
		$msg = "<span style='color:green;font-weight: bold'>Sent Successfully</span>";
	}else{
		$msg = "<span style='color:red;font-weight: bold'>Required feilds are cannot be empty!</span>";
	}
}
?>

<style>
table tr td:nth-child(1) {  
 width:30%;
}
table tr td{  
 padding-bottom:2%;
}
</style>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce.js" ></script>

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">  Send Mail <?=$msg;?></h3>
						</div>
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
							<div class="panel-body">
								<table style="width:80%;">
								   <tr>
										<td>To <font color="red">*</font></td>
										<td>
											<input type="text" name="tomail" id="tomail" value="<?php echo $tomail; ?>" class="form-control" readonly>
										</td>
									</tr>
									<tr>
										<td>Subject <font color="red">*</font></td>
										<td>
											<input type="text" name="subject" id="subject" value="" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Message <font color="red">*</font></td>
										<td>
											<textarea name="message" class='form-control tiny'></textarea>
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="send" value="Submit"></div>
								<a class="btn btn-info" href="contact.php">Cancel</a>
							</div>
						</form>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
				</div>
			  </div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
	</div>
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>