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
//echo "select a.*,b.title,b.price from checkout as a inner join course as b on a.course_id=b.id where a.id='$id' ";
$GetRecord=$db->singlerec("select a.*,b.title,b.price from checkout as a inner join course as b on a.course_id=b.id where a.id='$id' ");
	$first_name = $GetRecord['first_name'];
	$last_name = $GetRecord['last_name'];
	$title = $GetRecord['title'];
	/* $price = $GetRecord['price'];
	$card_name = $GetRecord['card_name'];
	$card_number= $GetRecord['card_number'];
	$cvv= $GetRecord['cvv'];
	$exp_month= $GetRecord['exp_month'];
	$exp_year = $GetRecord['exp_year']; */
	$country= $GetRecord['country'];
	$state = $GetRecord['state'];
	$city = $GetRecord['city'];
	$zip = $GetRecord['zip'];
	$email = $GetRecord['email'];
	$mobile = $GetRecord['mobile'];
	
	$crcdt = $GetRecord['crcdt'];
	
	$ip_addr = $GetRecord['ip_addr'];
	$crcdts=date('d-m-Y',strtotime($crcdt));
	

?>

					<!--Page content-->
                    <!--===================================================-->
                <div id="page-content">
					<div class="row">
						<div class="col-md-6 col-sm-12">
					     <h4 style="padding:10px 0; font-weight:400;"><b>User Checkout Information</b></h4>
					      
							<div class="form-group row">
								<label class="col-xs-5 control-label">Name</label>
								<div class="col-xs-7">
								  <?php echo $first_name.' '.$last_name;?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Course Name</label>
								<div class="col-xs-7">
								  <?php echo $title;?>
								</div>
							</div>
							<!--<div class="form-group row">
								<label class="col-xs-5 control-label">Price</label>
								<div class="col-xs-7">
								  <?php echo $price;?>
								</div>
							</div>
						  
							<div class="form-group row">
								<label class="col-xs-5 control-label">Card Name</label>
								<div class="col-xs-7">
								  <?php echo $card_name;?>
								</div>
							</div>

						    <div class="form-group row">
								<label class="col-xs-5 control-label">Card No</label>
								<div class="col-xs-7">
								  <?php echo $card_number;?>
								</div>
							</div>
						    <div class="form-group row">
								<label class="col-xs-5 control-label">CVV</label>
								<div class="col-xs-7">
								  <?php echo $cvv;?>
								</div>
							</div>
						    <div class="form-group row">
								<label class="col-xs-5 control-label">exp_month</label>
								<div class="col-xs-7">
								  <?php echo $exp_month;?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">exp_year</label>
								<div class="col-xs-7">
								  <?php echo $exp_year;?>
								</div>
							</div>-->
						    <div class="form-group row">
								<label class="col-xs-5 control-label">Country</label>
								<div class="col-xs-7">
								  <?php echo getCountry($country);?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">State</label>
								<div class="col-xs-7">
								  <?php echo getState($state);?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">City</label>
								<div class="col-xs-7">
								  <?php echo getCity($city); ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Zip Code</label>
								<div class="col-xs-7">
								  <?php echo $zip; ?>
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
								<label class="col-xs-5 control-label">Registered date</label>
								<div class="col-xs-7">
								 <?php echo $crcdt; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">IP Address</label>
								<div class="col-xs-7">
								 <?php echo $ip_addr; ?>
								</div>
							</div>
							
						</div>
						<div class="col-sm-12 text-center"><a class="btn btn-info" href="checkout.php">Back</a></div>
					</div>
				</div>

                <!--===================================================-->
                <? include "leftmenu.php"; ?>	
				<? include "footer.php"; ?>
            </div>				