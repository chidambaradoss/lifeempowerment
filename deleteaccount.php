<?php
include "includes/header.php";
if(isset($submit)){
	$deleted=isset($delete)?$delete:'';
	$reason=$db->escapstr($reasons);
	if(!empty($deleted)){
		$db->insertrec("UPDATE register SET active_status='$deleted',delete_reason='$reason' WHERE id='$user_id'");
		session_destroy();
		header("location:index.php?deleted");
	}
}
	
?>

		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
					<?php 
				    include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
				 
				    <div class="col-sm-12 profile-box">
					   <form class="form-horizontal" name="forms" method="POST" onsubmit="return ValidateDelete()" action="">

						   <div class="col-md-12 row">
						      <div class="panel">
								  <div class="panel-body" style="padding:25px;">
									<fieldset>
									  <legend>Delete your account.</legend>
								       <div class="col-md-12">
									       <p style="font-size:14px;">Deleting your account is permanent. It cant be undone. Once your accout is deleted you need to contact admin to reactivate your account.</p>
										   
										   <div class="form-group">
											  <input type="checkbox" name="delete" value="5" > Delete my account permanently.
										   </div>
										   
										   
										   <div class="form-group">
											  <label class="profile-label">Reason for delete account</label>
											  <textarea class="form-control" name="reasons" rows="5"></textarea>
										   </div>
										   
										   
										   <div class="form-group text-center mt15">
											  <input type="submit" name="submit" class="button primary rounded" value="Delete Account">
										   </div>
									   </div>
									</fieldset>
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
<script> 	
	function ValidateDelete() {
		if ($('input:checkbox[name="delete"]:checked').length === 0){
		swal ("Oops...","Please select your option","error");
		return false;
	} 	
		var a = document.forms.reasons.value;
    if (a == "") {
        swal("Oops...","Reason for delete account must be filled out","error");
        return false;
    }
}
</script>	