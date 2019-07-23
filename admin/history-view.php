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
$coid=isset($coid) ? $coid : '';
$usid=isset($usid) ? $usid : '';
//echo $usid;exit;
if($coid){
	$GetRecord=$db->singlerec("select * from course where id='$coid'");
	$GetRecordss=$db->singlerec("select * from checkout where course_id='$coid'");
	$userid = $GetRecordss['user_id'];
	$title = $GetRecord['title'];
	$desc = $GetRecord['description'];
	$cat = $GetRecord['cat'];
	$subcat = $GetRecord['subcat'];
	$cat1=$db->singlerec("select * FROM category where id='$cat'");
	$catname=$cat1['category_name'];
	$cat2=$db->singlerec("select * FROM category where id='$subcat'");
	$catname1=$cat2['category_name'];
	$price = $GetRecord['price'];
	$duration = $GetRecord['duration'];
}else if($usid){
$GetRecord1=$db->singlerec("select * from checkout where user_id='$usid'");
	$first_name = $GetRecord1['first_name'];
	$crs= $GetRecord1['course_id'];
	$last_name = $GetRecord1['last_name'];	
	$email = $GetRecord1['email'];
	$mobile = $GetRecord1['mobile'];
	
}
?>

					<!--Page content-->
                    <!--===================================================-->
                <div id="page-content">
				<?if($coid){?>
					<div class="row">
						<div class="col-md-6 col-sm-12">
					     <h4 style="padding:10px 0; font-weight:400;"><b>User Course Information</b></h4>
					      
							
							<div class="form-group row">
								<label class="col-xs-5 control-label">Course Name</label>
								<div class="col-xs-7">
								  <?php echo $title?>
								</div>
							</div>
						  
							<div class="form-group row">
								<label class="col-xs-5 control-label">Description</label>
								<div class="col-xs-7">
								  <?php echo $desc;?>
								</div>
							</div>

						    <div class="form-group row">
								<label class="col-xs-5 control-label">Main Category</label>
								<div class="col-xs-7">
								  <?php echo $catname;?>
								</div>
							</div>
						    <div class="form-group row">
								<label class="col-xs-5 control-label">Sub Category</label>
								<div class="col-xs-7">
								  <?php echo $catname1;?>
								</div>
							</div>
						    <div class="form-group row">
								<label class="col-xs-5 control-label">Price</label>
								<div class="col-xs-7">
								  <?php echo $price;?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-xs-5 control-label">Duration</label>
								<div class="col-xs-7">
								  <?php echo $duration;?>
								</div>
							</div>

						</div>
						<div class="col-sm-12 text-center"><a class="btn btn-info" href="course-history.php?uid=<?=$userid;?>">Back</a></div>
					</div>
				<?}else{?>
				<div class="row">
						<div class="col-md-6 col-sm-12">
					     <h4 style="padding:10px 0; font-weight:400;"><b>User Information</b></h4>
					      
							
							<div class="form-group row">
								<label class="col-xs-5 control-label">First Name</label>
								<div class="col-xs-7">
								  <?php echo $first_name?>
								</div>
							</div>
						  
							<div class="form-group row">
								<label class="col-xs-5 control-label">Last Name</label>
								<div class="col-xs-7">
								  <?php echo $last_name;?>
								</div>
							</div>

						    <div class="form-group row">
								<label class="col-xs-5 control-label">Email</label>
								<div class="col-xs-7">
								  <?php echo $email;?>
								</div>
							</div>
						    <div class="form-group row">
								<label class="col-xs-5 control-label">Mobile No</label>
								<div class="col-xs-7">
								  <?php echo $mobile;?>
								</div>
							</div>
						   

						</div>
						
						<div class="col-sm-12 text-center"><a class="btn btn-info" href="course-history.php?coreid=<?=$crs;?>">Back</a></div>
					</div>
				<?}?>
				</div>

                <!--===================================================-->
                <? include "leftmenu.php"; ?>	
				
            </div>	
<? include "footer.php"; ?>			