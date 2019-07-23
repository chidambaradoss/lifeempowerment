<?php
include "includes/header.php";
if(isset($submit)){
	$notifi=isset($notification)?$notification:'';
	if(!empty($notifi)){
		$db->insertrec("UPDATE register SET notification_off='$notifi' WHERE id='$user_id'");
		header("location:userprivacy.php?updated");
	}
}
?>
<script>
function ValidatePrivacy()  
	{ 
if ($('input:checkbox[name="notification"]:checked').length === 0){
		swal ("Oops...","Please select your notifications","error");
		return false;
	} 	
}
</script>

		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				<?php if(isset($updated)){
							echo"<div class='alert alert-success'>Privacy setting updated successfully</div>";
						}
				?>
				 <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
				  
				    <div class="col-sm-12 profile-box">
					   <form class="form-horizontal" method="POST" name="Form" onsubmit="return ValidatePrivacy()"  action="" >
							
						   <div class="col-md-12 row">
						      <div class="panel">
								  <div class="panel-body" style="padding:25px;">
								    <h3 class="bold text-center">Edit Privacy</h3>
								<!--<fieldset>
									  <legend>Profile Page Settings</legend>
								       <div class="col-md-8">
									       <div class="form-group">
											  <input type="checkbox"> Show my profile on search engines.
										   </div>
										   
										   <div class="form-group">
											  <input type="checkbox">  Show courses I am taking on my profile page.
										   </div>
										   
										   <!--<div class="form-group text-center mt15">
											  <input type="submit" class="button primary rounded" value="Save">
										   </div>-->
									   </div>
									</fieldset>
									
									<fieldset>
									   <legend>Notifications</legend>
									   
									   <div class="col-md-8">
										   <div class="form-group">
												  <input type="checkbox" name="notification"  value="1">  Don't send me any promotional emails.
											</div>
										</div>
									</fieldset>
									
									
									<div class="form-group text-center mt15">
											  <input type="submit" name="submit" class="button primary rounded" value="Save">
								    </div>
								  </div>
							  </div>
						   </div>   
						</form>
					</div>
				  </div>
				</div>
			</section><!-- #course-about -->	
		</div><!-- .site-content -->
<?php include "includes/footer.php"; ?>	
		