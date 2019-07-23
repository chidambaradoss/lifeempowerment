<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Sub Category </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Sub Category </li>
                            </ol>
                        </div>
                    </div>
<?
$act=isSet($act)?$act:''; 
$id=isSet($id)?$id:'';
$mid=isSet($mid)?$db->escapstr($mid):'';
$upd=isSet($upd)?$upd:'';
$status=isSet($status)?$status:'';
$Message=isSet($Message)?$Message:'';

if($act=="del"){
	$Remimage=$db->singlerec("select img from category where id='$id'");
	$Removeimage="../uploads/category/" .$Remimage['img'];
	@unlink($Removeimage);
    $db->insertrec("delete from category where id='$id'");
    header("location:subcategory.php?act='del'&mid=$mid");
    exit ;
}
if($status=="1"){
    $db->insertrec("update category set active_status='0' where id='$id'");
    header("location:subcategory.php?act=sts&mid=$mid");
    exit ;
}
else if($status=="0"){
    $db->insertrec("update category set active_status='1' where id='$id'");
    header("location:subcategory.php?act=sts&mid=$mid");
    exit ;
}
$GetRecord=$db->get_all("select * from category where parent_id='$mid' order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i=0; $i<count($GetRecord); $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$category_name=$GetRecord[$i]['category_name'];
	$img=$GetRecord[$i]['img'];
	$active_status = $GetRecord[$i]['active_status'] ;
	$slno = $i + 1 ;

	if($active_status=='0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
	}	
    else if($active_status=='1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='subcategoryupd.php?upd=2&id=$idvalue&mid=$mid' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
	
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$category_name</td>
				<td  align='left'> <img src='../uploads/category/".$img."' width='100px' class='img-circle'/></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='subcategory.php?id=$idvalue&mid=$mid&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='subcategory.php?id=$idvalue&mid=$mid&act=del' class='btn btn-default' onclick='confirm();' title='Delete'>$GT_Delete</a>
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
								<div class="col-sm-12 text-right">
								<a class="btn btn-info" href="category.php">Back</a>
								<a class="btn btn-info" href="subcategoryupd.php?upd=1&mid=<?echo $mid?>">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Sub Category Name</th>
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
