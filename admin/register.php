<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> User </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">User </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$idvalue= isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$active_status=isSet($active_status)?$active_status:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';

if($act == "del") {
	$Remimage=$db->singlerec("select img from register where id='$id'");
	$Removeimage="../uploads/profile_images/" .$Remimage['img'];
	//echo "../uploads/profile_images/" .$Remimage['img']; exit;
	@unlink($Removeimage);
    $db->insertrec("delete from register where id='$id'");
    header("location:register.php?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update register set active_status='0' where id='$id'");
    header("location:register.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update register set active_status='1' where id='$id'");
    header("location:register.php?act=sts");
    exit ;
}


$GetRecords=$db->get_all("select * from register order by id desc");

if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
$j=1;
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	$email = $GetRecord['email'];
	$mobile = $GetRecord['mobile'];
	$headline = $GetRecord['headline'];
	$crcdt = $GetRecord['crcdt'];
	$crcdt=date('d-m-Y',$crcdt);
	$active_status = $GetRecord['active_status'] ;
	
    if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='registerupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
	
	
    $disp .="<tr>
				<td  align='left'>$j</td>
				<td  align='left'>$fname</td>
				<td  align='left'>$lname</td>
				<td  align='left'>$email</td>
				<td  align='left'>$mobile</td>
				<td  align='left'>$headline</td>
				<td  align='left'>$crcdt</td>
				<td  align='left'><a href='course-history.php?uid=$idvalue' class='btn btn-default' title='history' data-toggle='tooltip'>Course history</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='userview.php?upd=2&id=$idvalue' title='View User Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='register.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='register.php?id=$idvalue&act=del' class='btn btn-default' title='Delete' data-toggle='tooltip' onclick=\"return confirm('Are you sure to delete?');\">$GT_Delete</a>
					
				</div>
				</td>
			</tr>";
			$j++;
		
}
if($act == "'del'")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
else if($act == "mailerror")
    $Message="<b><font color='red'>Email is already Existing !</font></b>";
?>
<!-- datepicker start -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<!--datepicker end-->
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
							<div class="col-sm-12 text-right"><a class="btn btn-info" href="registerupd.php?upd=1">Add New</a></div>
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Si.No</th>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email Address</th>
											<th>Mobile No</th>
											<th>Headline</th>
											<th>Date</th>
											<th>Course</th>
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
	<script type="text/javascript" src="js/datepicker.js"></script>
<? include "footer.php"; ?>