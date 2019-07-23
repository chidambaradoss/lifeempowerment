<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Checkout </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Checkout </li>
                            </ol>
                        </div>
                    </div>
<?php
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$idvalue= isSet($id) ? $id : '' ;
$status = isSet($status) ? $status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$pay_status=isSet($pay_status)?$pay_status:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';
$uid=isSet($uid)?$uid:'';
$coreid=isSet($coreid)?$coreid:'';
if($status == "1") {
    $db->insertrec("update checkout set pay_status='0' where id='$id'");
    header("location:checkout.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update checkout set pay_status='1' where id='$id'");
    header("location:checkout.php?act=sts");
    exit ;
}

if($uid){
	//$GetRecords=$db->get_all("select a.* , b.* FROM checkout as a INNER JOIN course as b ON a.user_id='$uid'");
		$GetRecords=$db->get_all("select * FROM checkout where user_id='$uid'");
}else if($coreid){
	//$GetRecords=$db->get_all("select a.* , b.* FROM checkout as a INNER JOIN course as b ON a.course_id='$coreid'");
$GetRecords=$db->get_all("select * FROM checkout where course_id='$coreid'");}


if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
$i=1;
foreach($GetRecords as $Record=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$ck = $GetRecord['course_id'];
	$ck1 = $GetRecord['user_id'];
	$fname=$GetRecord['first_name'];
	$lname=$GetRecord['last_name'];
	$mail=$GetRecord['email'];
	$ph=$GetRecord['mobile'];
$GetRecords1=$db->singlerec("select * FROM course where id='$ck'");
	$title = $GetRecords1['title'];
	$cat = $GetRecords1['cat'];
	$subcat = $GetRecords1['subcat'];
	$cat1=$db->singlerec("select * FROM category where id='$cat'");
	$catname=$cat1['category_name'];
	$cat2=$db->singlerec("select * FROM category where id='$subcat'");
	$catname1=$cat2['category_name'];
	$pr=$GetRecords1['price'];
	$duration=$GetRecords1['duration'];
	$pay_status = $GetRecord['pay_status'] ;
	
    if($pay_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";

	}	
    else if($pay_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}
	if($uid){
	    $disp .="<tr>
				<td  align='left'>$i</td>
				<td  align='left'>$title</td>
				<td  align='left'>$catname</td>
				<td  align='left'>$catname1</td>
				<td  align='left'>$pr</td>
				<td  align='left'>$duration</td>
				
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='history-view.php?coid=$ck' title='View checkout Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
	
				</div>
				</td>
			</tr>";
	}else{
 $disp .="<tr>
				<td  align='left'>$i</td>
				<td  align='left'>$title</td>
				<td  align='left'>$fname</td>
				<td  align='left'>$lname</td>
				<td  align='left'>$mail</td>
				<td  align='left'>$ph</td>
				
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='history-view.php?usid=$ck1' title='View checkout Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
	
				</div>
				</td>
			</tr>";
	}
			$i++;
			
}
if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
?>
 <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title" ><?php echo $Message ?></h3>
                            </div>
                            <div class="panel-body">
								
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
									<?if($uid){?>
										 <tr>
											<th>S.No</th>
											<th>Course Name</th>
											<th>Main Category</th>
											<th>Sub Category</th>
											<th>Price</th>
											<th>Duration</th>
											<th class='cntrhid'>Action</th>
                                        </tr>
									<?}else if($coreid){?>
                                       <tr>
											<th>S.No</th>
											<th>Course Name</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>mobile</th>
											<th class='cntrhid'>Action</th>
                                        </tr>
									<?}?>
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