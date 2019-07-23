<?php include "header.php"; ?>
<!--===================================================-->
<!--END NAVBAR-->
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<div class="pageheader">
			<h3><i class="fa fa-users"></i> Course </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active">Course </li>
				</ol>
			</div>
		</div>
<?php
$status = isSet($status) ? $status : '' ;
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$Message = isSet($Message) ? $Message : '' ;
$records = $GT_RecPerPage;

if($act == "del") {
	$Remimage=$db->singlerec("select img1,img2,video_pre1,video1,video_pre2,video2 from course where id='$id'");
	$Removeimage1="../uploads/course_images/" .$Remimage['img1'];
	@unlink($Removeimage1);
	$Removeimage2="../uploads/course_images/".$Remimage['img2'];
	@unlink($Removeimage2);
	$Removeimage3="../uploads/course_video/" .$Remimage['video1'];
	@unlink($Removeimage3);
	$Removeimage4="../uploads/course_video/" .$Remimage['video2'];
	@unlink($Removeimage4);
	$Removeimage5="../uploads/video_images/" .$Remimage['video_pre1'];
	@unlink($Removeimage5);
	$Removeimage6="../uploads/video_images/".$Remimage['video_pre2'];
	@unlink($Removeimage6);
    $db->insertrec("delete from course where id='$id'");
    header("location:course.php?act='del'&id=$id");
    exit ;
}
if($status == "1") {
    $db->insertrec("update course set active_status='0' where id='$id'");
    header("location:course.php?act=sts&id=$id");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update course set active_status='1' where id='$id'");
    header("location:course.php?id=$id&act=sts");
    exit ;
}

@$GetRecord=$db->get_all("select * from course order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    @extract($GetRecord[$i]);   
	$slno=$i+1;
    $idvalue = $GetRecord[$i]['id'];
	$title=$GetRecord[$i]['title'];
	$description=$GetRecord[$i]['description'];		
	$cat=$GetRecord[$i]['cat'];
	$Getcatname=$db->singlerec("select * from category where id='$cat'");
	$subcat=$GetRecord[$i]['subcat'];
	$Getsubcatname=$db->singlerec("select * from category where id='$subcat'");
	$type=$GetRecord[$i]['type'];
	$level=$GetRecord[$i]['level'];
	$date1=$GetRecord[$i]['crcdt'];
	$crcdt=date('d-m-Y',$date1);
	$active_status=$GetRecord[$i]['active_status'];
	$slno=$i+1;
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
		$EditLink = "<a href='courseupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
	$desc=substr($description,0,75);
    $disp .="<tr><td width='5%'>$slno</td>

				
				<td  align='left' width='10%'>$title</td>
				<td  align='left'  width='10%'>$desc.....</td>
				<td  align='left'  width='10%'>$Getcatname[category_name]</td>
				<td  align='left'  width='10%'>$Getsubcatname[category_name]</td>
				<td  align='left'  width='10%'>$GT_types[$type]</td>
				<td  align='left'  width='10%'>$GT_level[$level]</td>
				<td  align='left'  width='10%'>$crcdt</td>
				<td  align='left'  width='10%'><a href='course-history.php?coreid=$idvalue' class='btn btn-default' title='history' data-toggle='tooltip'>payment history</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='course.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='course.php?id=$idvalue&act=del' class='btn btn-default' title='Delete' data-toggle='tooltip' onclick=\"return confirm('Are you sure to delete?');\">$GT_Delete</a>
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
						<h3 class="panel-title"><?//echo $Message;?></h3>
					</div>
					<div class="panel-body">
					<div class="col-sm-12 text-right"><a class="btn btn-info" href="courseupd.php?upd=1">Add New</a></div>
						 <table id="demo-dt-basic" class="table table-striped table-bordered">
						<!--<table id="demo-dt-basic2" class="table table-striped table-bordered">-->
							<thead>
								<tr>
									<th>S.no</th>
									<th>Class Title</th>
									<th>Class Description</th>
									<th>Category</th>
									<th>Subcategory</th>
									<th>Class Type</th>
									<th>Level</th>
									<th>Date</th>
									<th>User History</th>
									<th class='cntrhid'>Action</th>
								</tr>
							</thead>
							<tbody><?php echo $disp; ?></tbody>
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