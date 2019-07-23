<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		
		<div class="pageheader">
			<h3><i class="fa fa-home"></i> Country </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Country </li>
				</ol>
			</div>
		</div>
<? 
$country_id = isSet($country_id) ? $country_id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$act = isSet($act) ? $act : '' ;

if($act == "del") {
	$db->insertrec("delete from country where country_id='$country_id'");
    header("location:country.php?act='del'&page=$page");
    exit ;
}
if($status == "1") {
	$crcdt = time();
    $db->insertrec("update country set country_status='0' where country_id='$country_id'");
    header("location:country.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update country set country_status='1' where country_id='$country_id'");
    header("location:country.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from country order by country_status desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $country_id = $GetRecord[$i]['country_id'] ;
	$country_name=$GetRecord[$i]['country_name'];
	$active_status = $GetRecord[$i]['country_status'] ;
	
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
	$EditLink = "<a href='countryupd.php?upd=2&id=$country_id' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'><a href='state.php?cid=$country_id'>$GT_RightSign $country_name</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='country.php?country_id=$country_id&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='country.php?country_id=$country_id&act=del' onclick=\"return confirm('Are you sure to delete?');\" class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="countryupd.php?upd=1">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
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

