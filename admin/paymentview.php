<?php include "header.php"; ?>
            <div id="content-container">
                    <div class="pageheader">
                        <h3><i class="fa fa-user" aria-hidden="true"></i> User View</h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active"> User View
                        </div>
                    </div>
<?php
$id=isset($id) ? $id : '';
//echo "select a.*,b.title from checkout as a inner join course as b on a.course_id=b.id where a.id='$id'";
$GetRecord=$db->singlerec("select a.*,b.title from checkout as a inner join course as b on a.course_id=b.id where a.id='$id'");
	$first_name = $GetRecord['first_name'];
	$last_name = $GetRecord['last_name'];
	$title = $GetRecord['title'];
	$card_name = $GetRecord['card_name'];
	$card_number= $GetRecord['card_number'];
	$cvv= $GetRecord['cvv'];
	//$exp_month= $GetRecord['exp_month'];
	//$exp_year = $GetRecord['exp_year'];
	$country= $GetRecord['country'];
	$state = $GetRecord['state'];
	$city = $GetRecord['city'];
	$zip = $GetRecord['zip'];
	$email = $GetRecord['email'];
	$mobile = $GetRecord['mobile'];
	$crcdt = $GetRecord['crcdt'];
	$ip_addr = $GetRecord['ip_addr'];
	$crcdt1=date($crcdt);

?>

					<!--Page content-->
                    <!--===================================================-->
                <div id="page-content">
					<div class="row">
						<div class="col-md-6 col-sm-12">
					     <h4 style="padding:10px 0; font-weight:400;"><b>User Payment Information</b></h4>
					      
							<div class="form-group row">
								<label class="col-xs-5 control-label">Name</label>
								<div class="col-xs-7">
								  <?php echo $first_name.' '.$last_name;?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Email</label>
								<div class="col-xs-7">
								  <?php echo $email;?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Mobile</label>
								<div class="col-xs-7">
								  <?php echo $mobile; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Course Name</label>
								<div class="col-xs-7">
								  <?php echo $title; ?>
								</div>
							</div>

							<!--<div class="form-group row">
								<label class="col-xs-5 control-label">Expiry date</label>
								<div class="col-xs-7">
								  <?php echo $exp_month;?>/<?=$exp_year;?>
								</div>
							</div>-->	
								<div class="form-group row">
								<label class="col-xs-5 control-label">Date</label>
								<div class="col-xs-7">
								  <?php echo $crcdt1;?>
								</div>
							</div>								
						</div>
						<div class="col-sm-12 text-center"><a class="btn btn-info" href="payment.php">Back</a></div>
					</div>
				</div>

                <!--===================================================-->
                <? include "leftmenu.php"; ?>	
				<? include "footer.php"; ?>
            </div>				