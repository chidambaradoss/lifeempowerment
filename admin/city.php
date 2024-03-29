<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i> City </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> City </li>
				</ol>
			</div>
		</div>
<?	
$act = isSet($act) ? $act : '' ; 
$sid = isSet($sid) ? $sid : '' ;
$cid = isSet($cid) ? $cid : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$city_name = isSet($city_name) ? $city_name : '' ;

if($act == "del") {
	$db->insertrec("delete from city where city_id='$id'");
    header("location:city.php?act='del'&cid=$cid&sid=$sid&page=$page");
    exit ;
}
if($status == "1") {
    $aa = $db->insertrec("update city set city_status='0' where city_id='$id'");
    header("location:city.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update city set city_status='1' where city_id='$id'");
    header("location:city.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from city where city_state_id='$sid' order by city_id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $idvalue = $GetRecord[$i]['city_id'] ;
	$city_name=$GetRecord[$i]['city_name'];
	$active_status = $GetRecord[$i]['city_status'] ;
	
	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='cityupd.php?upd=2&id=$idvalue&sid=$sid&cid=$cid' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
    $disp .="<tr>
				<td>$slno</td>
				<td align='left'>$city_name</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='city.php?id=$idvalue&sid=$sid&cid=$cid&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='city.php?act=del&id=$idvalue&sid=$sid&cid=$cid' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
			
}

if($act == "'del'")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
?>  
<!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
							<div class="col-sm-1 text-left"><a class="btn btn-info" href="state.php?cid=<?echo $cid; ?>">Back</a></div>
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="cityupd.php?upd=1&cid=<? echo $cid; ?>&sid=<? echo $sid; ?>">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Name</th>
											<th class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
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
<? include "footer.php"; ?>