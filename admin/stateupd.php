<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>State </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> State </li>
				</ol>
			</div>
		</div>
		
<?
$upd = isset($upd)?$upd:'';
$sid = isSet($sid) ? $sid : '' ;
$cid = isSet($cid) ? $cid : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$state_name = isSet($state_name) ? $state_name : '' ;
if($submit) {
    $crcdt = time();
    $state_name  = trim(addslashes($state_name));
	$checkStatus = $db->check1column("state","state_name",$state_name);
	if($state_name != ''){
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "state_name = '$state_name'";
			if($upd == 1){
				$set  .= ",state_status = '1'";
				$set  .= ",state_country_id = '$cid'";
				$db->insertrec("insert into state set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update state set $set where state_id='$sidval'");
				$act = "upd";
			}
			header("location:state.php?&page=$pg&act=$act&cid=$cid");
			exit;
		}else{
			$upd = $upd ;
			$Message = "<font color='red'>$state_name Already Exit</font>";
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
	$Getmaincat=$db->singlerec("select * from state where state_id=$sid");
    $state_name = stripslashes($Getmaincat['state_name']);
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
							<h3 class="panel-title"><? echo $TextChange;?> State</h3>
						</div>
						<form class="form-horizontal" method="post" action="">
							<input type="hidden" name="idvalue" value="<?echo $cid;?>" />
							<input type="hidden" name="sidval" value="<?echo $sid;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="state_name" id="state_name" value="<? echo $state_name; ?>" class="form-control">
										</td>
									</tr>
							    </table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="state.php?cid=<? echo $cid; ?>">Cancel</a>
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