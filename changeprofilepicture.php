<?php
include "includes/header.php";
if(isset($submit)) {
	$imag=$_FILES['image']['tmp_name'];
	$imag=isset($imag)?$imag:'';
	$uniq=uniqid();
	if($imag!=''){
		$upload=$com_obj->upload_image("image",$uniq,300,300,"uploads/profile_images/","new");
		if($upload){
			$newimage=$com_obj->img_Name;
			$db->insertrec("UPDATE register SET img='$newimage' WHERE id='$user_id'");
			header("location:changeprofilepicture.php?update");
		}
		else{
			$imgerr=$com_obj->img_Err;
		}
	}
	else{
		$imgerr="Please upload your image";
	}
}
?>

		<div id="content" class="site-content">			
			<section id="course-about" class="course-section">
				<div class="container ">
				<?php if(isset($update) && empty($imgerr) ){
							echo"<div class='alert alert-success'> Image uploaded successfully</div>";
						}
						$imgerr=isset($imgerr)?$imgerr:'';
						if(!empty($imgerr)){
							echo"<div class='alert alert-danger'> $imgerr</div>";
						}
					?>
					 <?php include "includes/profileleft.php"; ?>
				  <div class="col-sm-9">
				  
				    <div class="col-sm-12 profile-box">
					   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

						   <div class="col-md-12 row">
						      <div class="panel">
								  <div class="panel-body" style="padding:25px;">
								    <fieldset>
									  <legend>Profile Photo</legend>
								    <div class="col-sm-4 text-center">
									   <div class="thumbnail">
											 <img src="uploads/profile_images/<?php echo $userinfo['img']; ?>" alt="Profile Picture" class="img-responsive">
										</div>
									</div>
									<div class="col-sm-8">
									   <p class="pg_content">Permitted Image Types: JPG,PNG,JPEG<br>
									   Permitted Image Size: 2MB<br>
									   Minimum Image Width and Height: 300 x 300 pixels  </p>
									   <button class="file-upload btn_full_outline button btn-black rounded btn-block"><input type="file" name="image" class="file-input"><i class="icon-picture"> </i> Choose File</button>
									   
									   <button type="submit" name="submit" value="submit" class="file-upload btn_full_outline button primary rounded btn-block"><i class="icon-picture"> </i> Submit</button>
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