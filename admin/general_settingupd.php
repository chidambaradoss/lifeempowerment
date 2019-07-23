<?php include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> General Setting </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active"> General Setting </li>
                            </ol>
                        </div>
                    </div>
<?php
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '';
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;

if($act ==  "del" && $nimg != "") {
    $RemoveImage = "uploads/general_setting/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update general_setting set img='noimage.jpg' where id='$id'");
    header("Location:general_settingupd.php?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}

if(isset($g_submit)){
    $crcdt = time();
	$website_title = $db->escapstr($website_title);
	$website_keyword = $db->escapstr($website_keyword);
	$website_url = $db->escapstr($website_url);
	$admin_email = $db->escapstr($admin_email);
	$paypal_email = $db->escapstr($paypal_email);
	$fburl = isset($fb_url)?$db->escapstr($fb_url):'';
	$twurl = isset($tw_url)?$db->escapstr($tw_url):'';
	$linkedinurl = $db->escapstr($linkedinurl);
	$gplusurl = $db->escapstr($gplusurl);
	if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name'] != "null"){
		$fpath = $_FILES['Img']['tmp_name'] ;
		$fname = $_FILES['Img']['name'] ;
		$getext = substr(strrchr($fname, '.'), 1);
		$ImgExt = strtolower($getext); 
	}
	if($ImgExt=="jpg" || $ImgExt == "jpeg" || $ImgExt == "gif" || $ImgExt == "png" || $ImgExt == ''){	
		$set  = "website_title = '$website_title'";
		$set .= ",website_keyword = '$website_keyword'";
		$set .= ",website_url = '$website_url'";
		$set .= ",admin_email = '$admin_email'";
		$set .= ",paypal_email = '$paypal_email'";
		$set .= ",fburl = '$fburl'";
		$set .= ",twurl = '$twurl'";
		$set .= ",linkedinurl = '$linkedinurl'";
		$set .= ",gplusurl = '$gplusurl'";
		$set .= ",ipaddr = '$ipaddress'";		
		$set .= ",chngdt = '$crcdt'";    
		$set .= ",userchng = '$usrcre_name'";
		$db->insertid("update general_setting set $set where id='1'");
		if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name']!="null"){
			$fpath = $_FILES['Img']['tmp_name'];
			$fname = $_FILES['Img']['name'];
			$getext = substr(strrchr($fname,'.'),1);
			$ext = strtolower($getext);
			$NgImg= "logo".".".$ext;
			$set_img = "img = '$NgImg'";
			$des = "uploads/general_setting/$NgImg";
			move_uploaded_file($fpath,$des);
			chmod($des,0777);
			$db->insertrec("update general_setting set $set_img where id='1'");
		}
		header("location:general_settingupd.php?page=$pg&act=$act");
		exit;
	}	
	else{
		$Message = "<font color='red'>kindly upload jpg,gif,png image format only</font>";
	}
}
	
$GetRecord = $db->singlerec("select * from general_setting where id='1'");
@extract($GetRecord);
$website_title = stripslashes($website_title);
$website_keyword = stripslashes($website_keyword);
$website_url = stripslashes($website_url);
$admin_email = stripslashes($admin_email);
$paypal_email = stripslashes($paypal_email);
//code for images 
if($img == "noimage.jpg") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '';
    }
else if($img != "") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '<a href="general_settingupd.php?act=del&nimg='.$img.'&id='.$id.'">Delete</a>';
}?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce.js" ></script> 
<!--Page content-->
<!--===================================================-->
<div id="page-content">
<!-- Basic Data Tables -->
<!--===================================================-->
<h3>View General Setting Details</h3></br>
<div class="panel">
<div class="panel-heading">
	</div>
		<div class="panel-body">
			<table>
				<thead>
					<form method="post" action="general_settingupd.php" enctype="multipart/form-data" class="form-horizontal">
					<tr>
						<td><label>Website Title <font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="website_title" value="<? echo $website_title; ?>" placeholder="Enter Title" required></td>
					</tr>
					<tr>
						<td valign="top"><label valign="top">Website Keywords <font color="red">*</font></label></td>
						<td><textarea name="website_keyword" class="form-control tiny" rows="4" cols="45"><? echo $website_keyword; ?></textarea></td>
					</tr>
					<tr>
						<td><label>Website Url <font color="red">*</font></label></td>
						<td><input type="text" class="form-control" name="website_url" value="<? echo $website_url; ?>" placeholder="Enter Url" required></td>
					</tr>
					<tr>
						<td><label>Admin Email<font color="red">*</font></label></td>
						<td><input type="email" class="form-control" name="admin_email" value="<?=$admin_email; ?>" placeholder="Enter Email" required></td>
					</tr>
					<tr>
						<td><label>Paypal Email<font color="red">*</font></label></td>
						<td><input type="email" class="form-control" name="paypal_email" value="<? echo $paypal_email; ?>" placeholder="Enter Title" required></td>
					</tr>
					<tr>
						<td ><label>Facebook</label></td>
						<td><input name="fb_url" class="form-control" value="<?echo $fburl;?>" placeholder="Facebook Link"></td>
					</tr>
					<tr>
						<td ><label>Twitter</label></td>
						<td><input name="tw_url" class="form-control" value="<?echo $twurl;?>" placeholder="Twitter Link"></td>
					</tr>
					<tr>
						<td ><label>Linked In</label></td>
						<td><input name="linkedinurl" class="form-control" value="<?echo $linkedinurl;?>" placeholder="Linked In Link"></td>
					</tr>
					<tr>
						<td ><label>Google Plus</label></td>
						<td><input name="gplusurl" class="form-control" value="<?echo $gplusurl;?>" placeholder="Facebook Link"></td>
					</tr>
					<tr>
						<td>Website Logo</td>
						<td><img src="uploads/general_setting/<? echo $img; ?>" alt="exclusivescript" width="268px" height="50px"><br>
						<? echo $DisplayDeleteImgLink; ?>
						<input name="Img" type="file" class="form-control">
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
						<input type="submit" name="g_submit" class="btn btn-primary" value="Save">
						<input type="reset" name="reset" class="btn btn-primary" value="Reset">
						</td>
					</tr>
					</form>
				</thead>
			</table>
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
<?

include "footer.php";
?>