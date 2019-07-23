<?php
if($user_id=='') {
	echo "<script>location.href='index.php';</script>";
	header("Location: index.php");exit;
}
?>
<div class="col-sm-3"> 
				    <div class="col-sm-12 profile-box">
					   <ul class="profile-list nav">
					      <div class="thumbnail">
							 <img src="uploads/profile_images/<?php echo $userinfo['img']; ?>" alt="Profile Picture" class="img-responsive">
						  </div>
						  
						  <div class="row mt10 text-center">
						     <div class="col-md-6">
							    <a  style="color:#74c042;" href="#" data-toggle="modal" data-target="#followers">
								   <i class="fa fa-2x fa-user"></i>
								   <?php
								   $countt=$com_obj->followers($user_id); 
								   ?>
								   <p>Followers <?php echo $countt; ?></p>
								</a>
							 </div>
							 
							 <div class="col-md-6" style="color:#74c042;">
							    <a  style="color:#74c042;" href="#" data-toggle="modal" data-target="#following">
								   <i class="fa fa-2x fa-users"></i>
								   <?php
								   $count=$com_obj->following($user_id); ?>
								   <p>Following <?php echo $count; ?></p>
								</a>
							 </div>
						  </div>
						  
						  
						  <li>
						     <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#general" aria-expanded="false" aria-controls="general"><fieldset><legend style="margin-bottom: 5px;">General</legend></fieldset></a>
						  </li>
						    <div id="general" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							  <div class="panel-body">
								<ul class="profile-list nav">
								<?php if($userinfo['user_role']==1){
										$link="teacherdashboard.php";
									}
										elseif($userinfo['user_role']==0){
										$link="studentdashboard.php";
										}
									else{
										$link="javascript:;";
									} 
								?>
								  <li <?php if($livepage==$link){
								  echo "class='active'";}?>><a href="<?php echo $link;?>">Dashboard</a></li>
								  <li <?php if($livepage=="userprofile.php"){
								  echo "class='active'";}?>><a href="userprofile.php">Profile</a></li>
								  <li <?php if($livepage=="usereditprofile.php"){
								  echo "class='active'";}?>><a href="usereditprofile.php">Edit Profile</a></li>
								  <li <?php if($livepage=="changeprofilepicture.php"){
								  echo "class='active'";}?>><a href="changeprofilepicture.php">Change Profile Photo</a></li>
								  <li <?php if($livepage=="messages.php"){
								  echo "class='active'";}?>><a href="messages.php">Messages</a></li>
								  <li <?php if($livepage=="useraccountsetting.php"){
								  echo "class='active'";}?>><a href="useraccountsetting.php">Change Password </a></li>
								 <!-- <li /*  <?php if($livepage=="paymentmethod.php"){
								  echo "class='active'";}?> */ ><a href="payment-method.html">Payment Method</a></li>-->
								  <li <?php if($livepage=="userprivacy.php"){
								  echo "class='active'";}?>><a href="userprivacy.php">Privacy</a></li>
								  <li <?php if($livepage=="deleteaccount.php"){
								  echo "class='active'";}?>><a href="deleteaccount.php">Delete Account</a></li>
								</ul>
							  </div>
							</div>
						    
							<!--<li>
								 <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Course" aria-expanded="false" aria-controls="Course"><fieldset><legend style="margin-bottom: 5px;">Course</legend></fieldset></a>
							</li>
							
							<div id="Course" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							  <div class="panel-body">
								<ul class="profile-list nav">
								    <li><a href="my-courses.html">My Course</a></li>
									<li><a href="#">My favourite</a></li>
									<li><a href="#">In Progress</a></li>
								</ul>
							  </div>
							</div>
							
							
							<li>
								 <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Teacher" aria-expanded="false" aria-controls="Teacher"><fieldset><legend style="margin-bottom: 5px;">Teacher</legend></fieldset></a>
							</li>
							
							<div id="Teacher" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							  <div class="panel-body">
								<ul class="profile-list nav">
								    <li><a href="#">Become a Teacher</a></li>
									<li><a href="post-course.html">Post Course</a></li>
									<li><a href="#">My Listing</a></li>
								</ul>
							  </div>
							</div>-->
					   </ul>
					</div>
				  </div>