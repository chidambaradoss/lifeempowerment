<?php
include "includes/header.php";
if($userinfo['user_role']==1){
	header("location:teacherdashboard.php");
}
if(isset($user_role)){
	$db->insertrec("UPDATE register SET user_role=1 WHERE id='$user_id'");
	header("location:teacherdashboard.php?upd");
}
?>
         <div id="content" class="site-content">
            <section id="course-about" class="course-section">
                <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/become-a-teacher.jpg" style="height:300px;">
					<div class="container">
						<h1>Teach on Skillshare</h1>
						<p>Share your passion with millions of students around the world</p>
						<a href="becomeateacher.php?user_role=1" name="course" class="button success large rounded">Get Started</a>
					</div><!-- .container -->
				</div><!-- .page-title -->
				
				<div class="container">
				   <div class="col-sm-12 text-center mt20 mb20">
				      <h1 class="mt10 mb10">Why Teach on Skillshare?</h1>
					  <h4 class="mt20 pdb20">You'll earn money every time a student takes your class. Top teachers make up to $40,000 a year. Plus, creating classes is easy with our simple format and supportive community. </h4>
					  <div class="row mt30">
					      <div class="col-sm-4">
						      <img src="images/teach1.jpg" alt="Profile Picture" class="img-responsive" style="width:100%;">
							  <h4 class="mt10">Earn Money</h4>
							  <p class="mt10">“Teaching on Skillshare provides a passive income stream, and that’s the holy grail for someone in my shoes.”</p>
						  </div>
						  
						  <div class="col-sm-4">
						      <img src="images/teach2.jpg" alt="Profile Picture" class="img-responsive" style="width:100%;">
							  <h4 class="mt10">Launch Your Career</h4>
							  <p class="mt10">“It’s enabled me to support my family as a freelancer… I never thought I’d be able to work from home like this.”</p>
						  </div>
						  
						  <div class="col-sm-4">
						      <img src="images/teach3.jpg" alt="Profile Picture" class="img-responsive" style="width:100%;">
							  <h4 class="mt10">Give Back</h4>
							  <p class="mt10">“Teaching on Skillshare provides a passive income stream, and that’s the holy grail for someone in my shoes.”</p>
						  </div>
					  </div>
				   </div>
				</div>
				
				
				<div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/become-a-teacher2.jpg" style="height:400px;">
					<div class="container">
						<h1 style="font-weight:normal;">“My first thought was, who am I to teach?”</h1>
						<p>– Mary Kate McDevitt, Skillshare teacher with 50,000 students</p>
					</div><!-- .container -->
				</div><!-- .page-title -->
				
				<div class="container">
				   <div class="col-sm-12" id="university-courses" style="padding: 30px 0 20px;">
				        <div class="col-md-4 col-sm-6 col-xs-6 animation-element fade-in animated fadeInUp">
							<div class="service-box font-icon shadow">
								<h3>Create Your First Class</h3>
								<img src="images/book.png">
								<p>Quisque pulvinar libero dolor, quis bibendum eros euismod sit amet. Proin dapibus id diam at ullamcorper.</p>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6 col-xs-6 animation-element fade-in animated fadeInUp">
							<div class="service-box font-icon shadow">
								<h3>Engage With Students</h3>
								<img src="images/video-player.png">
								<p>Quisque pulvinar libero dolor, quis bibendum eros euismod sit amet. Proin dapibus id diam at ullamcorper.</p>
							</div>
						</div>
						
						
						<div class="col-md-4 col-sm-6 col-xs-6 animation-element fade-in animated fadeInUp">
							<div class="service-box font-icon shadow">
								<h3>Earn Revenue</h3>
								<img src="images/credit-card.png">
								<p>Quisque pulvinar libero dolor, quis bibendum eros euismod sit amet. Proin dapibus id diam at ullamcorper.</p>
							</div>
						</div>
				   </div>
				   
				   <div class="col-sm-12 text-center">
				       <h2>Ready to Start Teaching?</h2>
					   <p>Your audience awaits. Create your class and share your passion with millions of students today. </p>
					   <a href="becomeateacher.php?user_role=1" name="start" class="button success large rounded">Start a class </a>
				   </div>
				</div>
            </section>
            <!-- #course-about -->	
         </div>
         <!-- .site-content -->
 <?php include "includes/footer.php"; ?>       