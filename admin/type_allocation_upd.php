
<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Allocation Of Rights </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Allocation Of Rights </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$empid = isSet($empid) ? $empid : '' ;
$filteruser ='';

if($submit) {
    $crcdt = time();
	
	if($main_menu != '')
		$main_menuList = @join(",",$main_menu);
	else
		$main_menuList = "";
		
		$set  = "main_menu_id = '$main_menuList'";
		$set  .= ",emp_id = '$empid'"; 
		if($upd == 1){
			$set  .= ",crcdt = '$crcdt'";    
			$set  .= ",active_status = '1'";
			$set  .= ",usercre = '$usrcre_name'";
			$db->insertrec("insert into gen_sub_menu_mst set $set");
			$act = "add";
		}
    else if($upd == 2){
			$set  .= ",userchng = '$usrcre_name'";    
			$set  .= ",chngdt = '$crcdt'";
			$db->insertrec("update gen_sub_menu_mst set $set where sub_menu_auto_id='$idvalue'");
			$act = "upd";
		}
		header("location:type_allocation.php?page=$pg&act=$act");
		exit;
}
if($upd == 1){
$TextChange = "Allocate" ;
$GetstrVal = $db->Extract_Single("select emp_id from gen_sub_menu_mst");
if($GetstrVal != '')
	$filteruser = "and user_auto_id not in($GetstrVal)" ;
}
else if($upd == 2){
$TextChange = "Update" ;
$GetSBMRecord = $db->singlerec("select * from gen_sub_menu_mst where sub_menu_auto_id='$id'");
$SBM_id = $GetSBMRecord['main_menu_id'];
$checkarray = explode(",",$SBM_id);
$empid = $GetSBMRecord['emp_id'];
$filteruser = '';
}
$Disp_main_main = "";
$GetRecord=$db->get_all("select * from main_menu_mst where active_status='1' order by main_menu_id asc");
	for($j=0; $j<count($GetRecord); $j++){
		$mm_id = $GetRecord[$j]['main_menu_id'];
		if(@in_array($mm_id,$checkarray)){
			$Disp_main=ucfirst($GetRecord[$j]['main_menu']);
			$chkval = "checked";
			}
		else{
			$Disp_main=ucfirst($GetRecord[$j]['main_menu']);
			$chkval = "";
		}
		$Disp_main_main .="<input type='checkbox' name='main_menu[]' value='$mm_id' $chkval>$Disp_main<br/>";
  }
		
//code for username
$emp_List = "<option value=''>- - Select - -</option>";
$EmpRec = $db->get_all("select user_auto_id,name,username from gen_user_mst where active_status='1' $filteruser");
for($e=0;$e<count($EmpRec);$e++){
	$user_auto_id = $EmpRec[$e]['user_auto_id'];
	$name = ucwords($EmpRec[$e]['name']);
	$username = $EmpRec[$e]['username'];
	if($empid == $user_auto_id)
		$emp_List .= "<option value='$user_auto_id' selected>$username - $name</option>";
	else
		$emp_List .= "<option value='$user_auto_id'>$username - $name</option>";
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
							<h3 class="panel-title"><? echo $TextChange;?> News</h3>
						</div>
						<form name="menuval" method="post" action="type_allocation_upd.php" onsubmit="return menucheck();" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<? echo $id; ?>" />
							<input type="hidden" name="upd" value="<? echo $upd; ?>" />						
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Employee Name <font color="red">*</font></td>
										<td><select class="form-control" name="empid" id="empid" ><? echo $emp_List;?></select>
										</td>
									</tr>
									<tr>
										<td valign="top">Main Menu <font color="red">*</font></td>
										<td><? echo $Disp_main_main; ?></td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="type_allocation.php">Cancel</a>
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