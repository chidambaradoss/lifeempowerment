<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>City </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> City </li>
				</ol>
			</div>
		</div>
		
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$sid = isSet($sid) ? $sid : '' ;
$cid = isSet($cid) ? $cid : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$city_name = isSet($city_name) ? $city_name : '' ;

if($submit) {
    $crcdt = time();
    $city_name  = trim(addslashes($city_name));
	$checkStatus = $db->check1column("city","city_name",$city_name);
	if($city_name != ''){
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "city_name = '$city_name'";
			if($upd == 1){
				$set  .= ",city_status = '1'";
				$set  .= ",city_state_id = '$sid'";
				$set  .= ",city_country_id = '$cid'";
				$db->insertrec("insert into city set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update city set $set where city_id='$idvalue'");
				$act = "upd";
			}
			header("location:city.php?&cid=$cid&sid=$sid");
			exit;
			}
			else{
			$upd = $upd ;
			$Message = "<font color='red'>$city_name Already Exit</font>";
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
	$Getmaincat=$db->singlerec("select * from city where city_id='$id'");
    $city_name = stripslashes($Getmaincat['city_name']);
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
							<h3 class="panel-title"><? echo $TextChange;?> City</h3>
						</div>
						<form class="form-horizontal" method="post" action="">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="city_name" id="city_name" value="<? echo $city_name; ?>" class="form-control">
										</td>
									</tr>
							    </table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="city.php?cid=<? echo $cid; ?>&sid=<? echo $sid;?>">Cancel</a>
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