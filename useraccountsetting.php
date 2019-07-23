<?php
include "includes/header.php";
if(isset($password)){
	$curntpass=$db->escapstr($cpass);
	$pass=md5($curntpass);
	if($pass==$userinfo['password']){
		$newpass=$db->escapstr($npass);
		$confirmpass=$db->escapstr($conpass);
		$newpas=md5($newpass);
		if($newpass==$confirmpass){
			$db->insertrec("UPDATE register SET password='$newpas' WHERE id='$user_id'");
			header("location:useraccountsetting.php?updated");
		}
		else{
			$err="<div class='alert alert-danger'>New password does not match</div>";
		}
	}
	else{
		$err="<div class='alert alert-danger'>Your current password is incorrect</div>";
	}
}
?>
		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				<?php if(isset($updated)){
							echo"<div class='alert alert-success'>Your password changed successfully</div>";
						}
						echo $err=isset($err)?$err:'';
					?>
				   <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
					
				    <div class="col-sm-12 profile-box">
					   <form class="form-horizontal" method="POST" name="myforms" onsubmit="return ValidatePass()" action="">

						   <div class="col-md-12 row">
						      <div class="panel">
								  <div class="panel-body" style="padding:25px;">
								    <fieldset>
									  <legend>Change Password</legend>
								       <div class="col-md-8">
									       <div class="form-group">
											  <label class="profile-label">Current Password</label>
											  <input type="password" name="cpass" class="form-control">
										   </div>
										   <div class="form-group">
											  <label class="profile-label">New Password</label>
											  <input type="password" name="npass" class="form-control">
										   </div>
										   <div class="form-group">
											  <label class="profile-label">Confirm Password</label>
											  <input type="password" name="conpass" class="form-control">
										   </div>
										   
										   <div class="form-group text-center">
											  <input type="submit" name="password" class="button primary rounded" value="Change Password">
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
	function ValidatePass() {
		//fname validation
		var a = document.myforms.cpass.value;
    if (a == "") {
        swal("Oops...","Current password must be filled out","error");
        return false;
    }
	//lname validation
		var b = document.myforms.npass.value;
    if (b == "") {
        swal("Oops...","New password must be filled out","error");
        return false;
    }
	var c = document.myforms.conpass.value;
    if (c == "") {
        swal("Oops...","Confirm password must be filled out","error");
        return false;
    }
}
</script>	
		