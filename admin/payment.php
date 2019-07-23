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
$ser="";
if(isset($datebw)){
$date1 = $db->escapstr($from);
$date2 = $db->escapstr($to);
$d1=strtotime($date1);
$d2=strtotime($date2);
$ser .= "AND (a.crcdt BETWEEN '$d1' AND '$d2')"; 
}
//echo "select a.* , b.title FROM checkout as a INNER JOIN course as b ON a.course_id=b.id where title!='' $ser"; 
$GetRecords=$db->get_all("select a.* , b.title FROM checkout as a INNER JOIN course as b ON a.course_id=b.id where b.title!='' and a.pay_status='1' $ser ORDER BY a.id DESC ");

if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
$i=1;
foreach($GetRecords as $Record=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$title = $GetRecord['title'];
	$first_name = $GetRecord['first_name'];
	$last_name = $GetRecord['last_name'];
	$email = $GetRecord['email'];
	//$exp_month= $GetRecord['exp_month'];
	//$exp_year = $GetRecord['exp_year'];
	$pay_status = $GetRecord['pay_status'] ;
	$crcdt = $GetRecord['crcdt'];
	//$crcdt=date('d-m-Y',$crcdt);
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
	
	    $disp .="<tr>
				<td  align='left'>$i</td>
				<td  align='left'>$title</td>
				<td  align='left'>$first_name $last_name</td>
				<td  align='left'>$email</td>
				
				
				<td  align='left'>$crcdt</td>
				
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='paymentview.php?id=$idvalue' title='View checkout Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
				<a href='checkout.php?id=$idvalue&status=$pay_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
				</div>
				</td>
			</tr>";
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
							<!--<form method="post">
							<span style="float:right">
								From:&nbsp;<input type="date" name="from" id="from">
								To:&nbsp;<input type="date" name="to" id="to">
								<input type="submit" name="datebw" value="Search">
								</span>
								</form>-->  <br>
                            <div class="panel-body">
							
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Course Name</th>
											<th>User Name</th>
											<th>Email</th>
											<!--<th>Expiry date</th>-->
											<th>Date</th>
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

<script>
 // $( function() {
    // $( "#from" ).datepicker();
  // } );
  // $(function() {   
			    // $( "#from" ).datepicker({   
				// defaultDate: "+1w",  
			    // changeMonth: true,   
			    // numberOfMonths: 1,  
				// onClose: function( selectedDate ) 
				// {  
				// $( "#to" ).datepicker( "option", "minDate", selectedDate );  
				// }  
				// });  
				// $( "#to" ).datepicker({
				// defaultDate: "+1w",
				// changeMonth: true,
				// numberOfMonths: 1,
				// onClose: function( selectedDate ) {
				// $( "#from" ).datepicker( "option", "maxDate", selectedDate );
			    // }
				// });  
				// });  
</script>