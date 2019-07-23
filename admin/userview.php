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
$id = isSet($id) ? $id:'';
$GetRecord=$db->singlerec("select * from register where id='$id'");
	//echo "select * from register where id='$id'";
	$img = $GetRecord['img'];
	$firstname = $GetRecord['fname'];
	$lastname = $GetRecord['lname'];
	$email=$GetRecord['email'];
	$mobile=$GetRecord['mobile'];
	$language=$GetRecord['language'];
	//echo $language;
	$headline=$GetRecord['headline'];
	$bio=$GetRecord['bio'];
	$country=$GetRecord['country'];	
	$state=$GetRecord['state'];
	$city=$GetRecord['city'];
	$zip_code=$GetRecord['zip_code'];
	$website=$GetRecord['website'];
	$gender=$GetRecord['gender'];
	$facebook=$GetRecord['fb_url'];
	$twitter=$GetRecord['tw_url'];
	$linkedin=$GetRecord['linkedin_url'];
	$gplus=$GetRecord['gplus_url'];
	$ytube=$GetRecord['yt_url'];
	$crcdt=$GetRecord['crcdt'];
	$chngdt=$GetRecord['chngdt'];

	$useripaddres=$GetRecord['login_ip_addr'];
	//echo "dmfkgndfkng".$useripaddres;
		
	$crcdt=date('d-M-Y',$crcdt);?>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
					   <div class="row">
                       <div class="col-md-6 col-sm-12">
					     <h4 style="padding:10px 0; font-weight:400;"><b>Personal Information</b></h4>
						 <div class="form-group row">
							<label class="col-xs-7 control-label">User Image</label>
							<div class="col-xs-5">
							<?php echo '<img src="../uploads/profile_images/'.$img.'" width="100px">';?>
							</div>
						  </div>
					      
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Name</label>
							<div class="col-xs-5">
							  <?php echo $firstname.' '.$lastname;?>
							</div>
						  </div>

						  
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Email</label>
							<div class="col-xs-5">
							  <?php echo $email;?>
							</div>
						  </div>
						    <div class="form-group row">
							<label class="col-xs-7 control-label">Mobile</label>
							<div class="col-xs-5">
							  <?php echo $mobile;?>
							</div>
						  </div>
						    <div class="form-group row">
							<label class="col-xs-7 control-label">Language</label>
							<div class="col-xs-5">
							  <?php echo $language;?>
							</div>
						  </div>
						    <div class="form-group row">
							<label class="col-xs-7 control-label">Headline</label>
							<div class="col-xs-5">
							  <?php echo $headline;?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Bio</label>
							<div class="col-xs-5">
							  <?php echo $bio;?>
							</div>
						  </div>
						    <div class="form-group row">
							<label class="col-xs-7 control-label">Country</label>
							<div class="col-xs-5">
							  <?php echo getCountry($country);?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">State</label>
							<div class="col-xs-5">
							  <?php echo getState($state);?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">City</label>
							<div class="col-xs-5">
							  <?php echo getCity($city); ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Zip Code</label>
							<div class="col-xs-5">
							  <?php echo $zip_code; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Website url</label>
							<div class="col-xs-5">
							  <?php echo $website; ?>
							</div>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Gender</label>
							<div class="col-xs-5">
							 <?php echo $gender; ?>
							</div>
						  </div>
						   <div class="form-group row">
							<label class="col-xs-7 control-label">Registered date</label>
							<div class="col-xs-5">
							 <?php echo $crcdt; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Ipaddress</label>
							<div class="col-xs-5">
							 <?php echo $useripaddres; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Facebook</label>
							<div class="col-xs-5">
							 <?php echo $facebook; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Twitter</label>
							<div class="col-xs-5">
							 <?php echo $twitter; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">LinkedIn</label>
							<div class="col-xs-5">
							 <?php echo $linkedin; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Google plus</label>
							<div class="col-xs-5">
							 <?php echo $gplus; ?>
							</div>
						  </div>
						  <div class="form-group row">
							<label class="col-xs-7 control-label">Youtube</label>
							<div class="col-xs-5">
							 <?php echo $ytube; ?>
							</div>
						  </div>
					    </div>
						<div class="col-sm-12 text-center"><a class="btn btn-info" href="register.php">Back</a></div>

                <!--===================================================-->
                <? include "leftmenu.php"; ?>	
				<? include "footer.php"; ?>
            </div>

