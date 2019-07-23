<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Country </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Country </li>
				</ol>
			</div>
		</div>
		
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$country_name = isSet($country_name) ? $country_name : '' ;
if($submit) {
    $crcdt = time();
    $country_name  = trim(addslashes($country_name));
	$checkStatus = $db->check1column("country","country_name",$country_name);
	if($country_name != ''){
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "country_name = '$country_name'";
			if($upd == 1){
				$set  .= ",country_status = '1'";
				$db->insertrec("insert into country set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update country set $set where country_id='$idval'");
				$act = "upd";
			}
			header("location:country.php?&page=$pg&act=$act");
			exit;
		}else{
			$upd = $upd ;
			$Message = "<font color='red'>$country_name Already Exit</font>";
		}
    } 
	else{
		$upd = $upd ;
		$Message = "<font color='red'>Input Fields Marked With * are compulsory</font>";
	}
}
if($upd==1){
	$TextChange = "Add";
}
else if($upd==2){
	$TextChange = "Update";
	$Getmaincat=$db->singlerec("select * from country where country_id='$id'");
    $country_name = stripslashes($Getmaincat['country_name']);
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
							<h3 class="panel-title"><? echo $TextChange;?> Country</h3>
						</div>
						<form class="form-horizontal" method="post" action="">
							<input type="hidden" name="idval" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="country_name" id="country_name" value="<? echo $country_name; ?>" class="form-control" required>
										</td>
									</tr>
							    </table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="country.php">Cancel</a>
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