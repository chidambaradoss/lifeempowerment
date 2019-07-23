 <?php
include "includes/header.php";
$result=$db->singlerec("SELECT * FROM register WHERE id='$user_id'");
?> 
		
		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				  <?php if(isset($update)){
							echo"<div class='alert alert-success'> Profile updated successfully</div>";
						}
					?>
				  <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
					
				    <div class="col-sm-12 profile-box">
					   <form class="pd25">
					       <fieldset>					   
						   <legend>Basic Details<?php if($result['user_role']==0){ echo '<span class="pull-right"><a href="becomeateacher.php" class="button primary rounded" >Become a Teacher</a></span>';}?></legend>
						   <div class="row">
						        <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">First Name</label>
									   <div class="col-sm-9">
									      <p>&nbsp;<?php echo $result['fname']; ?></p>
									   </div>
									</div>
								</div>
								
								<div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Last Name</label>
									   <div class="col-sm-9">
									      <p>&nbsp;<?php echo $result['lname']; ?></p>
									   </div>
									</div>
								</div>
						   </div>
						   
						   <div class="row">
						      <div class="col-sm-12">
							    <div class="form-group">
								   <label class="profile-label col-sm-3">Headline</label>
								   <div class="col-sm-9">
									  <p>&nbsp;<?php echo $result['headline']; ?></p>
								   </div>
							    </div>
							  </div>
							  
							  <div class="col-sm-12">
							    <div class="form-group">
								   <label class="profile-label col-sm-3">Gender</label>
								   <div class="col-sm-9">
									  <p>&nbsp;<?php echo $result['gender']; ?></p>
								   </div>
							    </div>
							  </div>
						   </div>
						  
						   <div class="form-group">
							   <label class="profile-label col-sm-3">Bio</label>
							   <div class="col-sm-9">
								   <p>&nbsp;<?php echo $result['bio'];
								   ?></p>
							   </div>
							  </div> 
						  
						   <div class="row">
						        <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Website URL</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php echo $result['website']; ?></p>
									   </div>
									</div>
								</div>
								
								<div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Select Language</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php echo $result['language']; ?></p>
									   </div>
									</div>
								</div>
								</div>
						   </fieldset>
						   
						   
						   <fieldset class="mt20">
						      <legend>Other Details</legend>
							  <div class="row">
							     <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Mobile Number</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php echo $result['mobile']; ?></p>
									   </div>
									</div>
								 </div>
								 <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Email Address</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php echo $result['email']; ?></p>
									   </div>
									</div>
								 </div>
							  </div>
							  
							  <div class="row">
							     <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Country</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php $country=$result['country'];
													if(empty($country)){ 
														$coun='';
														}else{
															$name=$db->singlerec("SELECT country_name FROM country WHERE country_id='$country'");
															$coun=$name['country_name'];
														}
														echo $coun;
												?>
											</p>
									   </div>
									</div>
								 </div>
								 <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">State</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php $state=$result['state'];
													if(empty($state)){ 
														$stat='';
														}else{
															$stname=$db->singlerec("SELECT state_name FROM state WHERE state_id='$state'");
															$stat=$stname['state_name'];
														}
														echo $stat;
												?>
											</p>
									   </div>
									</div>
								 </div>
							  </div>
							  
							  <div class="row">
							     <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">City</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php $city=$result['city'];
													if(empty($state)){ 
														$citys='';
														}else{
															$citname=$db->singlerec("SELECT city_name FROM city WHERE city_id='$city'");
															$citys=$citname['city_name'];
														}
													echo $citys;
												?>
											</p>
									   </div>
									</div>
								 </div>
								 <div class="col-sm-12">
								    <div class="form-group">
									   <label class="profile-label col-sm-3">Zipcode</label>
									   <div class="col-sm-9">
										  <p>&nbsp;<?php echo !empty($result['zip_code'])?$result['zip_code']:''; ?></p>
									   </div>
									</div>
								 </div>
							  </div>
							  
							  
						   </fieldset>
						   
						   <fieldset class="mt20">
						      <legend>Social Connect</legend>
							  
							  <div class="row">
						        <ul class="social-list">
								    <li class="col-sm-12 ">
									   <div class="col-sm-3">
									      <a href="<?php 
														if(!empty($result['fb_url'])){
															$links= $result['fb_url']; 
														}else{
															$links='javascript:;';
														}
														echo $links;
													?>" target="_blank" class="fb btn btn-block">Facebook
											</a>
									  
									  </div>
									</li>
									
									<li class="col-sm-12 ">
									   <div class="col-sm-3">
									      <a href="<?php
														if(!empty($result['tw_url'])){
															$twit= $result['tw_url']; 
														}else{
															$twit='javascript:;';
														}
														echo $twit; 
														
													?>" target="_blank" class="tw btn btn-block">Twitter
											</a>
									   </div>
									</li>
									
									<li class="col-sm-12 ">
									   <div class="col-sm-3">
									      <a href="<?php 
														if(!empty($result['linkedin_url'])){
															$in= $result['linkedin_url']; 
														}else{
															$in='javascript:;';
														}
														echo $in;  
													?>" target="_blank" class="lnk btn btn-block">Linked In
											</a>
									   </div>
									</li>
									
									<li class="col-sm-12 ">
									   <div class="col-sm-3">
									      <a href="<?php 
														if(!empty($result['gplus_url'])){
															$plus= $result['gplus_url']; 
														}else{
															$plus='javascript:;';
														}
														echo $plus;   
													?>" target="_blank" class="gp btn btn-block">Google Plus
											</a>
									   </div>
									</li>
									
									<li class="col-sm-12 ">
									   <div class="col-sm-3">
									      <a href="<?php 
														if(!empty($result['yt_url'])){
															$tube= $result['yt_url']; 
														}else{
															$tube='javascript:;';
														}
														echo $tube; 
													?>" target="_blank" class="yt btn btn-block">YouTube
											</a>
									   </div>
									</li>
								</ul>
						       </div>
						   </fieldset>
					      
						  <div class="form-group text-center mt20">
						    <a href="usereditprofile.php" ><input type="button" class="button primary rounded" value="Edit Profile"></a>
						  </div>
					   </form>
					</div>
				  </div>
				</div>
			</section><!-- #course-about -->	
		</div><!-- .site-content -->

<?php include "includes/footer.php"; ?>	