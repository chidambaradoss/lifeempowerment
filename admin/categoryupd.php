<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Category </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Category </li>
				</ol>
			</div>
		</div>
<?
$id = isSet($id) ? $db->escapstr($id) : '' ;

if($submit) {
    $crcdt = time();
	$category_name = $db->escapstr($category_name);
	$img=isset($_FILES['img']['tmp_name'])?$_FILES['img']['tmp_name']:'';
	$checkStatus = $db->check1column("category","category_name",$category_name);
	if($upd==2)
		$checkStatus=0;

	if($checkStatus == 0){
		$set  = "category_name = '$category_name'";	
		$error='';
		if($img!=''){
			$file_to=uniqid();
			$file=$com_obj->upload_image("img",$file_to,570,570,"../uploads/category","NULL");
			if($file){
				$img=$com_obj->img_Name;
				$set .= ",img='$img'";
			}
			else {
				$error.="$com_obj->img_Err <br>";
			}
		}
		if($error=='') {
			if($upd == 1) {
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$db->insertrec("insert into category set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";   
				$db->insertrec("update category set $set where id='$idvalue'");
				$act = "upd";
			}
			echo "<script>window.location='category.php?act=$act'</script>"; 
			header("location:category.php?act=$act");
			exit;
		}	
		else {
			$error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$error</div>";
		}
	}
	else {
		$Message = "<font color='red'>$category_name Already Exist</font>";
	}
}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from category where id='$id'");
@extract($GetRecord);
$category_name = stripslashes($GetRecord['category_name']);
//$img=$GetRecord['img'];
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Category</h3>
						</div>
						<form class="form-horizontal" method="post" action="categoryupd.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td style="width:30%">Category Name<font color="red">*</font></td>
										<td><input type="text" name="category_name" class="form-control" value="<? echo $category_name; ?>"></td>
									</tr>
									<tr>
										<td style="width:30%">Img<font color="red">*</font></td>
										<td><input type="file" name="img" class="form-control" value="<? echo $img; ?>"></td>
									</tr>
									<?php
									echo $error=isset($error)?$error:"";
									?>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="category.php">Cancel</a>
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