<? include "header.php"; ?>
 <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Category </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Category </li>
                            </ol>
                        </div>
                    </div>
<?
$id=isset($id) ? $db->escapstr($id) : '';
$name=isset($name) ? $name : '';
$message=isset($message) ? $message : '';

if($submit){
	$crcdt=time();
	$name=$db->escapstr($name);
	$message=$db->escapstr($message);
	$image=$_FILES['image']['tmp_name']?$_FILES['image']['tmp_name']:'';
	$checkStatus=$db->check1column("testimonials","name",$name);
	if($upd==2)
		$checkStatus=0;
	
	if($checkStatus == 0){
		$set = "name = '$name'";	
		$set.=",message = '$message'";
		$error='';
		if($image!=''){
			$file_to=uniqid();
			$file=$com_obj->upload_image("image",$file_to,200,200,"../uploads/testimonial_images","NULL");
			if($file){
				$image=$com_obj->img_Name;
				$set .= ",image='$image'";
			}
			else {
				$error.="$com_obj->img_Err <br>";
			}
		}
		
	if($error=='') {
			if($upd == 1) {
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$db->insertrec("insert into testimonials set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";   
				$db->insertrec("update testimonials set $set where id='$idvalue'");
				$act = "upd";
			}
			echo "<script>window.location='testimonials.php?act=$act'</script>"; 
			header("location:testimonials.php?act=$act");
			exit;
		}	
		else {
			$error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$error</div>";
		}
	}
	else {
		$Message = "<font color='red'>$name Already Exist</font>";
	}
}
	
if($upd==1){
	$TextChange="Add";
}
elseif($upd==2){
	$TextChange="Edit";
	$GetRecord=$db->singlerec("select * from testimonials where id='$id'");
	$name=stripslashes($GetRecord['name']);
	$message=stripslashes($GetRecord['message']);
	}
?>

<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Testimonials</h3>
						</div>
						<form class="form-horizontal" method="post" action="testimonialsupd.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td style="width:30%">Name<font color="red">*</font></td>
										<td><input type="text" name="name" class="form-control" value="<? echo $name; ?>"></td>
									</tr>
									<tr>
										<td style="width:30%">Message<font color="red">*</font></td>
										<td><input type="text" name="message" class="form-control" value="<? echo $message; ?>"></td>
									</tr>
									<tr>
										<td style="width:30%">Image<font color="red">*</font></td>
										<td><input type="file" name="image" class="form-control" value="<? echo $image; ?>"></td>
									</tr>
									<?php
									echo $error=isset($error) ? $error:'';
									?>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="testimonials.php">Cancel</a>
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