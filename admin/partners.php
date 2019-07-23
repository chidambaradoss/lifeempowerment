<? include "header.php"; ?>
 <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Partners </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Partners </li>
                            </ol>
                        </div>
                    </div>
					
<?
$act = isSet($act) ? $act : '' ; 
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
	$Remimage=$db->singlerec("select image from partners where id='$id'");
	$Removeimage="../uploads/partner/" .$Remimage['image'];
	@unlink($Removeimage);
   $db->insertrec("delete from partners where id='$id'");
    header("location:partners.php?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update partners set active_status='0' where id='$id'");
    header("location:partners.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update partners set active_status='1' where id='$id'");
    header("location:partners.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from partners");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = stripslashes($GetRecord[$i]['id']);
	$name=$GetRecord[$i]['name'];
	$image=$GetRecord[$i]['image'];
	$active_status = $GetRecord[$i]['active_status'];
	$slno = $i + 1 ;
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
		$EditLink = "<a href='partnerupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
	
       $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$name</td>
				<td  align='left'> <img src='../uploads/partner/".$image."' width='100px' class='img-circle'/></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='partners.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='partners.php?id=$idvalue&act=del' onclick=\"return confirm('Are you sure to delete?');\" class='btn btn-default' title='Delete'>$GT_Delete</a>
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="partnerupd.php?upd=1">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Partner Name</th>
											<th>Image</th>
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