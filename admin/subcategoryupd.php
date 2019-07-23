<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Sub Category </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active">Sub Category </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$mid = isSet($mid) ? $db->escapstr($mid) : '' ;
$Message = isSet($Message) ? $Message : '' ;
$category_name = isSet($category_name) ? $category_name : '' ;


if($submit){
    $crcdt = time();
		$sub_name = trim(addslashes($sub_name));
		$checkStatus = $db->check2column("category","category_name",$sub_name);
		$img=isset($_FILES['img']['tmp_name'])?$_FILES['img']['tmp_name']:'';
		if($upd == 2)
			$checkStatus = 0;

		if($checkStatus == 0){
			$set ="category_name='$sub_name'";
			$set .=",parent_id='$midval'";
			
			$error='';
			if($img!='')
			{
			$file_to=uniqid();
			$file=$com_obj->upload_image("img",$file_to,200,200,"../uploads/category","NULL");
			if($file){
					$img=$com_obj->img_Name;
					$set .= ",img='$img'";
					//echo $img;exit;
			}
			else{
				$error.="$com_obj->img_Err <br>";
				}
			}
			
		if($error==''){
			if($upd == 1){
				$set .=",crcdt='$crcdt'";    
				$set .=",active_status='1'";
				$db->insertrec("insert into category set $set");
				$act="add";
			}
			else if($upd == 2){
				$set .=",chngdt='$crcdt'";    
				$db->insertrec("update category set $set where id='$idvalue'");
				$act="upd";
			}
			echo "<script>window.location='subcategory.php'</script>"; 
			header("location:subcategory.php?act=$act&mid=$midval");
			exit;
		}	
		else{
			$error = "<div class='alert alert-danger'><b>Problem with uploading: <br><br>Possible reasons are,</b><br>$error</div>";
		}
	}
		 else {
				$Message = "<font color='red'>$sub_name Already Exit's</font>";
		}
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from category where id='$id'");
@extract($GetRecord);

$sub_name = stripslashes($category_name);

?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Sub Category</h3>
						</div>
						<form class="form-horizontal" method="post" action="subcategoryupd.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="midval" value="<?echo $mid;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="sub_name" id="sub_name" value="<? echo $sub_name; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>MainCategory Name<font color="red">*</font></td>
										<td><select name="maincategory" id="maincategory" class="form-control">
											<?php
											echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0'",$mid);
											?>
										</select>
										</td>
									</tr>
												
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
								<a class="btn btn-info" href="subcategory.php?mid=<?echo $mid;?>">Cancel</a>
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