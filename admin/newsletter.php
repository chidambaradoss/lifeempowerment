<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> Subscribers </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Subscriber </li>
                            </ol>
                        </div>
                    </div>
					
<?
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ; 
$search=isSet($search)?$search:'';
$Message=isSet($Message)?$Message:'';


if($act == "del") {
    $db->insertrec("delete from newsletter where id='$id'");
    header("location:newsletter.php?act='del'");
    exit ;
}

$GetRecords=$db->get_all("select * from newsletter order by id desc");
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
$j=1;
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$email = $GetRecord['email'];
	$crcdt = $GetRecord['crcdt'];
	$crcdt = date("d-m-Y",$crcdt);
    $disp .="<tr>
				<td  align='left'>$j</td>
				<td  align='left'>$email</td>
				<td  align='left'>$crcdt</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='newsletter.php?id=$idvalue&act=del' class='btn btn-default' title='Delete' data-toggle='tooltip' onclick=\"return confirm('Are you sure to delete?');\">$GT_Delete</a>
				</div>
				</td>
			</tr>";
			$j++;
}
if($act == "'del'")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
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
							<div class="col-sm-12 text-right"><a class="btn btn-info" href="newsletterupd.php?upd=1">Send Mail</a></div>
		                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Si.No</th>
											<th>Email</th>
											<th>Added date</th>
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